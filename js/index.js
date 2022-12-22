jQuery(document).ready(($) => {
	let position, direction, previous;

	$(window).scroll(function () {
		if ($(this).scrollTop() >= position) {
			direction = 'down';
			if (direction !== previous) {
				$('header button.menu-toggle').addClass('hide');
				previous = direction;
			}
		} else {
			direction = 'up';
			if (direction !== previous) {
				$('header button.menu-toggle').removeClass('hide');
				previous = direction;
			}
		}
		position = $(this).scrollTop();
	});

	$('header button.menu-toggle').on('click', (event) => {
		event.preventDefault();

		// create menu variables
		const slideoutMenu = $('#mannering-main-nav');
		const slideoutMenuWidth = slideoutMenu.width();

		// toggle open class
		slideoutMenu.toggleClass('open');

		// slide menu
		if (slideoutMenu.hasClass('open')) {
			slideoutMenu.animate({
				left: '0px',
			});
		} else {
			slideoutMenu.animate(
				{
					left: -slideoutMenuWidth,
				},
				// eslint-disable-next-line comma-dangle
				500
			);
		}
	});
});
