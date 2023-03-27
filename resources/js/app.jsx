/**
 * First we will load all of this project's JavaScript dependencies which
 * includes React and other helpers. It's a great starting point while
 * building robust, powerful web applications using React + Laravel.
 */

import './bootstrap';

import '../css/app.css';
import ReactDOM from 'react-dom/client';
//en En componente Example/aplication se encontrará toda la aplicacion/codigo
import Example from './components/Example';
import NavBar from './components/NavBar';
import App from './components/App';

ReactDOM.createRoot(document.getElementById('application')).render(<App/>);
/**
 * Next, we will create a fresh React component instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


