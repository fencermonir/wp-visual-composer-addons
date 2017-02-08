(function ($) {
	window.VcPageTitleView = vc.shortcode_view.extend({
		template: _.template('<h2 class="wpb__page__title"><%= params.title %></h2>'),
		// Render method called after element is added( cloned ), and on first initialisation
		render: function () {
			window.VcPageTitleView.__super__.render.call(this); //make sure to call __super__. To execute logic fron inherited view. That way you can extend original logic. Otherwise, you will fully rewrite what VC will do at this event
			this.$el.find('.wpb_element_wrapper').html(this.template(this.model.toJSON()));
			return this;
		},
		changeShortcodeParams: function (model) {
			window.VcPageTitleView.__super__.changeShortcodeParams.call(this, model);
			this.render();
		}
	});
})(window.jQuery);
