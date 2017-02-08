(function ($) {
	window.VcCustomizableTextView = vc.shortcode_view.extend({
		template: _.template('<div class="wpb__customizable__text" style="font-size:<%= params.size %>px;font-weight:<%= params.weight %>;color:<%= params.color %>;"><%= params.content %></div>'),
		// Render method called after element is added( cloned ), and on first initialisation
		render: function () {
			window.VcCustomizableTextView.__super__.render.call(this); //make sure to call __super__. To execute logic fron inherited view. That way you can extend original logic. Otherwise, you will fully rewrite what VC will do at this event
			this.$el.find('.wpb_element_wrapper').html(this.template(this.model.toJSON()));
			return this;
		},
		changeShortcodeParams: function (model) {
			window.VcBigNumberView.__super__.changeShortcodeParams.call(this, model);
			this.render();
		}
	});
})(window.jQuery);
