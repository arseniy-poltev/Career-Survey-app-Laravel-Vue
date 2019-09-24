import Home from './components/Home';
import Profile from './components/Profile';
import Surveys from './components/Surveys';
import SurveysInput from './components/SurveysInput';
import SurveysEdit from './components/SurveysEdit';
import SurveysFeedback from './components/SurveysFeedback';
import SurveysPlan from './components/SurveysPlan';
import Users from './components/manage/Users';
import Settings from './components/manage/Settings';
import Welcome from './components/manage/Welcome';
import AllSurveys from './components/manage/AllSurveys';

export const routes = [
    {
        path: '',
        redirect: 'home',
        meta: {
            name: 'Home'
        }
    },
    {
        path: '/home',
        component: Home,
        meta: {
            name: 'Home'
        }
    },
    {
        path: '/profile',
        component: Profile,
        meta: {
            name: 'Profile'
        }
    },
    {
        path: '/surveys',
        component: Surveys,
        meta: {
            name: 'Surveys'
        }
    },
    {
        path: '/surveys/input/:hash',
        component: SurveysInput,
        props: true,
        meta: {
            name: 'SurveysInput'
        }
    },
    {
        path: '/surveys/edit/:hash',
        component: SurveysEdit,
        props: true,
        meta: {
            name: 'SurveysEdit'
        }
    },
    {
        path: '/surveys/feedback/:hash',
        component: SurveysFeedback,
        props: true,
        meta: {
            name: 'SurveysFeedback'
        }
    },
    {
        path: '/surveys/plan/:hash',
        component: SurveysPlan,
        props: true,
        meta: {
            name: 'SurveysPlan'
        }
    },
    {
        path: '/manage/users',
        component: Users,
        meta: {
            name: 'Manage Users'
        }
    },
    {
        path: '/manage/surveys',
        component: AllSurveys,
        meta: {
            name: 'All Surveys'
        }
    },
    {
        path: '/manage/settings',
        component: Settings,
        meta: {
            name: 'Settings'
        }
    },
    {
        path: '/manage/welcome',
        component: Welcome,
        meta: {
            name: 'Welcome'
        }
    },
];