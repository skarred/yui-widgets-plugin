YUI().use('transition', 'panel', function (Y) {

	var openBtn = Y.one('#openButton'),
		loginPanel, bblogin, registerPanel, bbregister, resetPanel, bbreset;

	function showLoginPanel() {
		loginPanel.show();
		bblogin.transition({
			duration: 0.5,
			top	 : '0px'
		});
	}
	function hideLoginPanel() {
		bblogin.transition({
			duration: 0.5,
			top	 : '-500px'
		}, function () {
			loginPanel.hide();
		});
	}

	function showRegisterPanel() {
		registerPanel.show();
		bbregister.transition({
			duration: 0.5,
			top	 : '0px'
		});
	}
	function hideRegisterPanel() {
		bbregister.transition({
			duration: 0.5,
			top	 : '-500px'
		}, function () {
			registerPanel.hide();
		});
	}

	function showResetPanel() {
		resetPanel.show();
		bbreset.transition({
			duration: 0.5,
			top	 : '0px'
		});
	}
	function hideResetPanel() {
		bbreset.transition({
			duration: 0.5,
			top	 : '-500px'
		}, function () {
			resetPanel.hide();
		});
	}



	loginPanel = new Y.Panel({
		srcNode: '#loginPanel',
		width  : "19em",
		xy	 : [300, -500],
		zIndex : 5,
		align: {
			node: "#wrapper", 
			points: ["bc", "tc"]
		},
		modal  : true,
		visible: false,
		render : true
	});

	registerPanel = new Y.Panel({
		srcNode: '#registerPanel',
		width  : "19em",
		xy	 : [300, -500],
		zIndex : 5,
		align: {
			node: "#wrapper", 
			points: ["bc", "tc"]
		},
		modal  : true,
		visible: false,
		render : true
	});

	resetPanel = new Y.Panel({
		srcNode: '#resetPanel',
		width  : "19em",
		xy	 : [300, -500],
		zIndex : 5,
		align: {
			node: "#wrapper", 
			points: ["bc", "tc"]
		},
		modal  : true,
		visible: false,
		render : true
	});
	//alert(resetPanel.get('initialized'));
	bblogin = loginPanel.get('boundingBox');
	bbregister = registerPanel.get('boundingBox');
	bbreset = resetPanel.get('boundingBox');


	var cancelLoginBtn = Y.one('#reset-login');
	cancelLoginBtn.on('click', function (e) {
		e.preventDefault();
			hideLoginPanel();
	});


	var cancelRegisterBtn = Y.one('#reset-register');
	cancelRegisterBtn.on('click', function (e) {
		e.preventDefault();
			hideRegisterPanel();
	});

	var cancelResetBtn = Y.one('#reset-reset');
	cancelResetBtn.on('click', function (e) {
		e.preventDefault();
			hideResetPanel();
	});

	var escapeLoginPanel = Y.one('.yui3-widget-mask');
	escapeLoginPanel.on('click', function (e) {
		e.preventDefault();
			hideLoginPanel();
	});

	var escapeRegisterPanel = Y.one('.yui3-widget-mask');
	escapeRegisterPanel.on('click', function (e) {
		e.preventDefault();
			hideRegisterPanel();
	});

	var escapeResetPanel = Y.one('.yui3-widget-mask');
	escapeResetPanel.on('click', function (e) {
		e.preventDefault();
			hideResetPanel();
	});

	openBtn.on('click', function (e) {
		showLoginPanel();
	});

	Y.on('click', function(){
			showRegisterPanel();
			loginPanel.hide();
	}, '#formmgr-login-links a.formmgr-register', loginPanel);
	Y.on('click', function(){
			showRegisterPanel();
			resetPanel.hide();
	}, '#formmgr-reset-links a.formmgr-register', resetPanel);

	Y.on('click', function(){
			showLoginPanel();
			registerPanel.hide();
	}, '#formmgr-register-links a.formmgr-login', registerPanel);
	Y.on('click', function(){
			showLoginPanel();
			resetPanel.hide();
	}, '#formmgr-reset-links a.formmgr-login', resetPanel);

	Y.on('click', function(){
			showResetPanel();
			loginPanel.hide();
	}, '#formmgr-login-links a.formmgr-reset', loginPanel);
	Y.on('click', function(){
			showResetPanel();
			registerPanel.hide();
	}, '#formmgr-register-links a.formmgr-reset', registerPanel);
	
 
	Y.on("contentready", function(){
		Y.all('.loading').each(function (node) {
			node.removeClass('loading');
		});
		Y.all('.yui3-panel-content').each(function (node) {
			node.setStyle({'border':'none', 'borderColor': 'transparent' });
		});
	}, "#panelWrapper", Y);
 
});

