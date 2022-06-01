
import { createRouter, createWebHistory } from "vue-router";
import HomeComponent from '../components/HomeComponent';
import VisitorComponent from '../components/VisitorComponent';
import AdminComponent from '../components/AdminComponent';
import UploadfileComponent from '../components/UploadfileComponent';
import HtmlComponent from '../components/HtmlComponent';
import LinkComponent from '../components/LinkComponent';
import FileeditCompoent from '../components/FileeditCompoent';
import HtmleditComponent from "../components/HtmleditComponent.vue";
import LinkeditComponent from "../components/LinkeditComponent";


  const  routes = [
    {
        path: "/",
        name: "app",
        component: HomeComponent
    },
    {
        path: "/home",
        name: "home",
        component: HomeComponent
    },
    {
        path: "/visitor",
        name: "visitor",
        component: VisitorComponent
    },
    {
        path: "/admin",
        name: "admin",
        component: AdminComponent,
        children:[
            {
                path: "file_upload",
                component: UploadfileComponent,
                props: true
            },
            {
                path: "html_snipped",
                component: HtmlComponent,
                props: true
            },
            {
                path: "links",
                component: LinkComponent,
                props: true
            },
            {
                path: "file/:id",
                component: FileeditCompoent,
                props: true
            },
            {
                path: "html_edit/:id",
                component: HtmleditComponent,
                props: true
            },
            {
                path: "link_edit/:id",
                component: LinkeditComponent,
                props: true
            }

   

        ]
    }
]



export default createRouter({
    history:createWebHistory('/'),
    routes,
});
