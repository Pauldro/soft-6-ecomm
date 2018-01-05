$(document).ready(function() {

	/*==============================================================
	   PAGE SCROLLING FUNCTIONS
	=============================================================*/
		$(window).scroll(function() {
			if ($(this).scrollTop() > 50) { $('#back-to-top').fadeIn(); } else { $('#back-to-top').fadeOut(); }
		});

		// scroll body to 0px on click
		$('#back-to-top').click(function () {
			$('#back-to-top').tooltip('hide');
			$('body,html').animate({ scrollTop: 0 }, 800);
			return false;
		});
		
		$('body').on('change', '.qty', function() {
			var input = $(this);
			var qty = $(this).val();
			var tablerow = input.closest('tr');
			tablerow.find('input[type=hidden][name=qty]').val(qty);
		});
		
		$(".page").on("change", ".results-per-page-form .results-per-page", function() {
			var form = $(this).closest("form");
			var ajax = form.hasClass('ajax-load');
			var showonpage = form.find('.results-per-page').val();
			var displaypage = form.attr('action');
			var href = URI(displaypage).addQuery('display', showonpage).toString();
			
			if (ajax) {
				var loadinto = form.data('loadinto');
				var focuson = form.data('focus');
				$(loadinto).loadin(href, function() {
					if (focuson.length > 0) { $('html, body').animate({scrollTop: $(focuson).offset().top - 60}, 1000);}
				});
			} else {
				window.location.href = href;
			}
		});
});

$.fn.extend({
	loadin: function(href, callback) {
		var element = $(this);
		var parent = element.parent();
		console.log('loading ' + element.returnelementdescription() + " from " + href);
		parent.load(href, function() { init_datepicker(); init_timepicker(); callback(); });
	},
	returnelementdescription: function() {
		var element = $(this);
		var tag = element[0].tagName.toLowerCase();
		var classes = '';
		var id = '';
		if (element.attr('class')) {
			classes = element.attr('class').replace(' ', '.');
		}
		if (element.attr('id')) {
			id = element.attr('id');
		}
		var string = tag;
		if (classes) {
			if (classes.length) {
				string += '.'+classes;
			}
		}
		if (id) {
			if (id.length) {
				string += '#'+id;
			}
		}
		return string;
	}
});
