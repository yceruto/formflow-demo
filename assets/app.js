import './bootstrap.js';
import 'bootstrap/dist/css/bootstrap.min.css';
import './js/tutor.js'
import './styles/app.css';

document.addEventListener('turbo:load', (event) => {
  // If disabled, adds => $flow->getStepForm() to the rendering section of your controller
  Turbo.session.drive = !event.detail.url.endsWith('/demo/signup');
})
