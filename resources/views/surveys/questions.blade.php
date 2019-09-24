<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <title>Business Health Check</title>
    <link rel="stylesheet" href="/css/survey.css" type="text/css" media="all"/>
    <link rel="icon" type="image/x-icon" href="/hrcoach/favicon.ico"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<div id="wrapper">
    <div id="header">
        <div id="logo"></div>
    </div>
    <div id="main"><p>Thank you for taking the time do to this Business Health Check for your business. The Business
            Health Check will provide you with an overview as to how your business is doing in relation to:</p>
        <ul>
            <li>Strategy;</li>
            <li>Finance;</li>
            <li>Marketing / Customer;</li>
            <li>Processes / Systems / Internal Business;</li>
            <li>People; and</li>
            <li>Corporate Social Responsibility.</li>
        </ul>
        <p>Once you have completed the survey, you will receive a one page summary. You will be sent the full report in
            the next couple of days.</p>
        <form>
            <table class="personal-data">
                <tr>
                    <td>
                        <label for="name">Name</label>
                        <input readonly name="name" id="name" value="{{ $survey->order->contact_name }}"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="business">Business</label>
                        <input readonly name="business" id="business" value="{{ $survey->order->business_name }}"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="email">Email</label>
                        <input readonly name="email" id="email" value="{{ $survey->order->contact_email }}"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="member_number">Number of Staff</label>
                        <input name="member_number" id="member_number" value=""/>
                    </td>
                </tr>
            </table>

            <table class="survey-data" id="initial">

                @php $i = 1; @endphp
                @foreach($grouppedQuestions->filter(function($c) { return $c->count() > 1;}) as $category => $questions)
                    <tbody>
                    <tr>
                        <th>Area</th>
                        <th>Question</th>
                        <th>Rarely / No</th>
                        <th>Sometimes</th>
                        <th>Usually</th>
                        <th>Always</th>
                    </tr>
                    <tr>
                        <td rowspan="5" class="area">{{ $category }}</td>
                        <td class="question">
                            {{ $i++ }}.
                            {{ $questions->first()->question }}
                        </td>
                        @for($j = 1; $j < 5; $j++)
                            <td class="answer">
                                <span class="check" id="check_{{$questions->first()->id}}_{{$j}}"
                                      data-category="{{ $questions->first()->category_id }}">&#9744;</span>
                            </td>
                        @endfor
                    </tr>
                    @foreach($questions as $key => $q)
                        @if(!$key)
                            @continue
                        @endif
                        <tr>
                            <td class="question">
                                {{ $i++ }}.
                                {{ $q->question }}
                            </td>
                            @for($j = 1; $j < 5; $j++)
                                <td class="answer">
                                    <span class="check" id="check_{{$q->id}}_{{$j}}"
                                          data-category="{{ $q->category_id }}">&#9744;</span>
                                </td>
                            @endfor
                        </tr>
                    @endforeach
                    </tbody>
                @endforeach
            </table>
            <table class="survey-data" id="additional">
                <thead>
                <tr>
                    <th>Area</th>
                    <th>Question</th>
                    <th>Rarely / No</th>
                    <th>Sometimes</th>
                    <th>Usually</th>
                    <th>Always</th>
                </tr>
                </thead>
                <tbody>
                @php $i = 0; @endphp
                @foreach($grouppedQuestions->filter(function($c) { return $c->count() === 1;}) as $category => [$question])
                <tr>
                    <td rowspan="1" class="area">{{ $category }}</td>
                    <td class="question">{{++$i}}. {{ $question->question }}</td>
                    @for($j = 1; $j < 5; $j++)
                    <td class="answer">
                        <span class="check" id="check_{{$question->id}}_{{$j}}"
                              data-category="{{ $question->category_id }}">&#9744;</span>
                    </td>
                    @endfor
                </tr>
                @endforeach
                </tbody>
            </table>

            <div class="actions">
                <a class="button submit" href="javascript:void(0);">Finish Survey</a>
            </div>
        </form>
        <div id="dialog-message" title="Survey"></div>
    </div>
    <div id="footer"></div>
</div>
<script
        src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
<script
        src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
        integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
        crossorigin="anonymous"></script>
<script type="text/javascript" src="/js/surveys/validation.js"></script>
<link type="text/css" href="http://code.jquery.com/ui/1.10.3/themes/start/jquery-ui.css" rel="stylesheet" media="all"/>

<script type="text/javascript">
    $(document).ready(function () {
        $('td.answer').mouseover(function () {
            $(this).find('span.check').addClass('mouseover').html('&#9745;');
        }).mouseout(function () {
            var checkSpan = $(this).find('span.check').removeClass('mouseover');
            if (!checkSpan.hasClass('active')) {
                checkSpan.html('&#9744;');
            }
        }).click(function () {
            var checkSpan = $(this).find('span.check');
            $(this).parent()
                .find('span.check[id^="' + checkSpan.attr('id').substr(0, checkSpan.attr('id').lastIndexOf('_') + 1) + '"]')
                .removeClass('active')
                .html('&#9744;');
            checkSpan.addClass('active').html('&#9745;');
        });
        $('span.answer').click(function () {
            $(this).parent().find('span.check').click();
        });

        $('a.submit').click(function () {
            if (validatePersonalDataForm()) {
                if ($('span[class="check active"]').length != 45) {
                    $("#dialog-message").html('<p><span class="ui-icon ui-icon-alert" style="float: left; margin: 0 7px 50px 0;"></span>' +
                        'You must answer all questions!!')
                        .dialog({
                            modal: true,
                            buttons: {
                                Ok: function () {
                                    $(this).dialog("close");
                                }
                            }
                        });
                } else {
                    var answers = [];
                    $.each($('#initial span[class="check active"]'), function (index, item) {
                        var obj = {
                            'category': $(item).data('category'),
                            'answer': $(item).attr('id').substr($(this).attr('id').lastIndexOf('_') + 1),
                            'id': $(this).attr('id').split('_')[1]
                        };
                        answers.push(obj);
                    });
                    $.each($('#additional span[class="check active"]'), function (index, item) {
                        var obj = {
                            'category': $(item).data('category'),
                            'answer': $(item).attr('id').substr($(this).attr('id').lastIndexOf('_') + 1),
                            'id': $(this).attr('id').split('_')[1]
                        };
                        answers.push(obj);
                    });
                    var personalData = {
                        'name': $('#name').val(),
                        'business': $('#business').val(),
                        'address': $('#address').val(),
                        'email': $('#email').val(),
                        'phone': $('#phone').val(),
                        'business_role': $('#business_role').val(),
                        'member_number': $('#member_number').val()
                    };

                    $.ajax({
                        'url': "",
                        'type': "POST",
                        'headers': {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        'data': {
                            'personalData': personalData,
                            'answers': answers,
                        },
                        'beforeSend': function () {
                            $("#dialog-message").html('<p><span class="ui-icon ui-icon-wrench" style="float: left; margin: 0 7px 50px 0;"></span>' +
                                'Please wait...<p>The data is being processed</p>')
                                .dialog({
                                    modal: true,
                                    dialogClass: "no-close",
                                    buttons: null
                                });
                        }
                    }).done(function (data) {
                        window.location.href = '/survey/success';
                    });
                }
            } else {
                $("html, body").animate({scrollTop: 0}, "slow");
            }
        });
    });
</script>
</body>
</html>
