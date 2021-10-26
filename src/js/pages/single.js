function single() {
  const bodyEl = document.querySelector('main');

  bodyEl.dataset.page === 'single' && (window.onload = init);
}

function init() {
  const els = [...document.querySelectorAll('.share')];

  els.forEach((el) =>
    el.addEventListener('click', (event) => {
      event.preventDefault();

      const {
        target: { href },
      } = event;
      window.open(
        href,
        '',
        'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600'
      );
    })
  );
}

export default single;
