import Home from './components/Home';

// Auth Components
import About from './components/auth/About';
import Register from './components/auth/Register';
import Login from './components/auth/Login';

// Layout Componets
import Dashboard from './components/layouts/Dashboard';

// Error Components
import NotFound from './components/errors/NotFound';

// CSV Componets
import Uploads from './components/csv/Uploads.vue';
import Import from './components/csv/Import.vue';
import EditBook from './components/csv/EditBook.vue';

export const routes = [
  {
      path: '*',
      component: NotFound
  },
  {
      path: '/',
      component: Home,
      name: "Home"
  },
  {
      path: '/about',
      component: About
  },
  {
      path: '/register',
      component: Register
  },
  {
      path: '/login',
      component: Login,
      name: 'Login'
  },
  {
      path: "/dashboard",
      name: "Dashboard",
      component: Dashboard,
       beforeEnter: (to, form, next) =>{
           axios.get('/api/athenticated').then(()=>{
               next()
           }).catch(()=>{
               return next({ name: 'Login'})
           })
       }

  },
  {
     name: 'Uploads',
     path: '/uploads',
     component: Uploads
  },
  {
     name: 'Import',
     path: '/import',
     component: Import
  },
  {
     name: 'Edit',
     path: '/edit/:id',
     component: EditBook
  }
];
