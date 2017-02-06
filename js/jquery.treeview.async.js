/*
 * Async Treeview 0.1 - Lazy-loading extension for Treeview
 * 
 * http://bassistance.de/jquery-plugins/jquery-plugin-treeview/
 *
 * Copyright (c) 2007 Jörn Zaefferer
 *
 * Dual licensed under the MIT and GPL licenses:
 *   http://www.opensource.org/licenses/mit-license.php
 *   http://www.gnu.org/licenses/gpl.html
 *
 * Revision: $Id$
 *
 */

;(function($) {

function load(settings, root, child, container) {
	
	function createNode(parent) {
		var current = $("<li/>").attr("id", this.id || "").html("<span>"+this.text+"</span>").appendTo(parent);
		
		if (this.classes) {
			current.children("span").addClass(this.classes);
		}
		
		// icon 넣어주기 by Wang
		if(settings.icon) {
			current.find("span:not(.placeholder)").addClass(settings.icon);
		}
		
		if(settings.count) {
			current.find(">span").after($("<sub/>",{"text":(this.count != '' ? '('+this.count+')' : '')}));
		}
		
		if (settings.collapsed === false) {
			current.addClass("open");
		}
		
		if (this.hasChildren || this.children && this.children.length) {
			var branch = $("<ul/>").appendTo(current);
			if (this.hasChildren && settings.collapsed && !settings.loadAll) {
				current.addClass("hasChildren");
				createNode.call({
					classes: "placeholder",
					text: "&nbsp;",
					children:[],
					count:''
				}, branch);
			}
			if (this.children && this.children.length) {
				$.each(this.children, createNode, [branch])
			}
		}
		
		// 선택한것 음영주기 by Wang
		current.find("span").on("click",function(){
			container.find("span").removeClass("selected");
			$(this).addClass("selected");
		});
		
	}
	$.ajax($.extend(true, {
		url: settings.url,
		dataType: "json",
		data: {
			root: root
		},
		success: function(response) {
			child.empty();
			$.each(response, createNode, [child]);
	        $(container).treeview({add: child});
	        
	        if(settings.dataLoaded)
				settings.dataLoaded();
	    }
	}, settings.ajax));
	
}

var proxied = $.fn.treeview;
$.fn.treeview = function(settings) {
	if (!settings.url) {
		return proxied.apply(this, arguments);
	}
	var container = this;
	if (!container.children().size())
		load(settings, "source", this, container);
	
	var userToggle = settings.toggle;
	return proxied.call(this, $.extend({}, settings, {
		collapsed: true,
		toggle: function() {
			var $this = $(this);
			if ($this.hasClass("hasChildren")) {
				var childList = $this.removeClass("hasChildren").find("ul");
				load(settings, this.id, childList, container);
			}
			
			// +- 아이콘 클릭시 페이지 이동 막음 by Wang
			if (userToggle && $(event.target).hasClass("hitarea") === false) {
				userToggle.apply(this, arguments);
			}
		}
	}));
};

})(jQuery);
