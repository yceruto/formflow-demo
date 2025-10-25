import {driver} from 'driver.js';
import 'driver.js/dist/driver.min.css';

const tutor = driver({
  popoverClass: 'driverjs-theme',
  stagePadding: 4,
});

if (document.querySelector('#sign_up_progressbar') && !localStorage.getItem('driver_memory_set')) {
  const tour = driver({
    showProgress: true,
    steps: [
      { element: '#sign_up_progressbar', popover: { title: 'Progress Rendering', description: 'FormFlow provides a <code>cursor</code> variable for tracking progress in the current process. Use <code>form.vars.cursor.currentStep</code> to display the active step.', side: 'right'}},
      { element: '#sign_up_step_form', popover: { title: 'Step form', description: 'FormFlow includes only the fields belonging to the active step. Fields from other steps are not built until their step becomes active.', side: 'left'}},
      { element: '#sign_up_navigator', popover: { title: 'Navigator', description: 'FormFlow includes a navigator form containing all required buttons for moving through the process.', side: 'top'}},
    ]
  });

  tour.drive();

  const memory = {
    sign_up_navigator_reset: {
      title: 'Reset progress',
      description: 'This button, generated from <code>ResetFlowType</code>, restores the current FormFlow to its initial state.',
    },
    sign_up_navigator_next: {
      title: 'Move to the next step',
      description: 'Button generated from <code>NextFlowType</code>, advancing the current FormFlow to the following step.',
    },
    sign_up_navigator_back: {
      title: 'Go back to the previous step',
      description: 'Button generated from <code>PreviousFlowType</code>, returning the FormFlow to the prior step. By default, this clears the current form. To keep the submission data, set <code>clear_submission</code> to <code>false</code>.',
    },
    sign_up_credentials_email: {
      side: 'bottom',
      title: 'Step-by-Step Validation',
      description: 'FormFlow validates only the fields of the active step. The step name <code>credentials</code> serves as one of the validation groups. Include this group in your constraints (e.g. <code>#[Email(groups: [\'credentials\'])]</code>) to control when each field is validated.',
    },
    sign_up_back_to_organization: {
      side: 'right',
      title: 'Jump back to a completed step',
      description: 'Button generated from <code>PreviousFlowType</code>, allowing direct navigation to any completed step. Set the button’s value to the target step name (e.g. <code>value="organization"</code>) to revisit and review that step.',
    },
    sign_up_navigator_finish: {
      title: 'Finish the process',
      description: 'Button generated from <code>FinishFlowType</code>, completing the current FormFlow and marking it as finished. Available only on the final step once all previous steps are valid.',
    }
  };

  for (let id in memory) {
    localStorage.setItem(id, JSON.stringify(memory[id]));
  }

  localStorage.setItem('driver_memory_set', '1');
}

document.addEventListener('click', (event) => {
  let target = event.target;
  if (!target.matches('button, input')) {
    target = target.closest('button');
    if (!target) return;
  }

  const id = target.id;
  if (!id || !localStorage.getItem(id)) return;

  event.preventDefault();

  const popover = JSON.parse(localStorage.getItem(id));
  localStorage.removeItem(id);

  tutor.highlight({
    element: '#' + id,
    popover: {
      side: 'top',
      ...popover,
    },
  });
});
