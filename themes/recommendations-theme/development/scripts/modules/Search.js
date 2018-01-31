import $ from 'jquery';

class Search {
	constructor() {
		this.searchOverlay = $('.search-overlay');
		this.resultsDiv = this.searchOverlay.find('.search-overlay__results');
		this.searchInputField = $('.site-header__form-input');
		// This prevents the closeOverlay method from repeatedly being called
		this.isOverlayOpen = false;
		this.isSpinnerVisible = false;
		this.previousValue;
		this.typingTimer;
		this.events();
	}

	// Events
	events() {
		this.searchInputField.on('keyup', this.openCloseOverlay.bind(this));
		this.searchInputField.on('keydown', this.closeOverlay.bind(this));
		this.searchInputField.on('keyup', this.typingLogic.bind(this));
	}
 
	// Methods
	openCloseOverlay(e) {
		this.searchOverlay.addClass('search-overlay--active');
		this.isOverlayOpen = true;

		if (!this.searchInputField.val() || e.keyCode == 27) {
			this.searchOverlay.removeClass('search-overlay--active');
			this.isOverlayOpen = false;
		}
	}

	closeOverlay(e) {
		if(e.keyCode == 27 && this.isOverlayOpen == true) {
			this.searchOverlay.removeClass('search-overlay--active');
			this.isOverlayOpen = false;
		}
	}

	typingLogic() {
		// Only run code if current value is not equal to new value (so it doesn't respond to arrow keys etc.)
		if (this.searchInputField.val() != this.previousValue) {

			// this resets the typing timer variable, so that only one server request is sent per timeout
			clearTimeout(this.typingTimer);
			
			if (this.searchInputField.val()) {

				// Display the spinner icon
				if (!this.isSpinnerVisible) {
					this.resultsDiv.html('<div class="spinner-loader"></div>');
					this.isSpinnerVisible = true;
				} 
				this.typingTimer = setTimeout(this.getResults.bind(this), 750);

			} else {
				this.resultsDiv.html('');
				this.isSpinnerVisible = false;
			}
		}

		this.previousValue = this.searchInputField.val();
	}

	getResults() {

		$.getJSON(recommendationsData.root_url + '/wp-json/recommendations/v1/search?term=' + this.searchInputField.val(), (results) => {
			if (results.generalInfo != '' || results.profiles != '' || results.things != '' || results.creators != '') {
				this.resultsDiv.html(`
					<div>${results.generalInfo.map(item => `<li><a href="${item.permalink}">${item.title}</a>${item.postType == 'post' || item.postType == 'page' ? ` by ${item.authorName}` : ''}</li>`).join('')}</div>
					<div><ul>${results.profiles.map(item => `<li><a href="${item.permalink}">${item.title}</a>`)}</ul></div>
					<div><ul>${results.things.map(item => `<li><a href="${item.permalink}">${item.title}</a>`)}</ul></div>
					<div><ul>${results.creators.map(item => `<li><a href="${item.permalink}">${item.title}</a>`)}</ul></div>
				`);
			} else {
				this.resultsDiv.html(`<div>Unfortunately your search didn't return any results.</div>`);
			}
		});
		this.isSpinnerVisible = false;
	}
}

export default Search;