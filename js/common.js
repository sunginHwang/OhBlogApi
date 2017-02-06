var nl2br = function(str) {
	return str ? str.replace(/\n/g, "<br />")  : null;
}

var weekOfMonth = function(d) {
	var w = Math.floor(d.date() / 7) + ((d.date()%7 - d.day() > 0) ? 1 : 0);
	return w > 0 ? w : weekOfMonth(d.clone().subtract(1,'month').endOf('month'));
}

var PostToUrl = (function($){
	var postToUrl = {};

	var createElement = (function()
	{
		// Detect IE using conditional compilation
		if (/*@cc_on @*//*@if (@_win32)!/*@end @*/false)
		{
			// Translations for attribute names which IE would otherwise choke on
			var attrTranslations =
			{
				"class": "className",
				"for": "htmlFor"
			};

			var setAttribute = function(element, attr, value)
			{
				if (attrTranslations.hasOwnProperty(attr))
				{
					element[attrTranslations[attr]] = value;
				}
				else if (attr == "style")
				{
					element.style.cssText = value;
				}
				else
				{
					element.setAttribute(attr, value);
				}
			};

			return function(tagName, attributes)
			{
				attributes = attributes || {};

				// See http://channel9.msdn.com/Wiki/InternetExplorerProgrammingBugs
				if (attributes.hasOwnProperty("name") ||
					attributes.hasOwnProperty("checked") ||
					attributes.hasOwnProperty("multiple"))
				{
					var tagParts = ["<" + tagName];
					if (attributes.hasOwnProperty("name"))
					{
						tagParts[tagParts.length] =
							' name="' + attributes.name + '"';
						delete attributes.name;
					}
					if (attributes.hasOwnProperty("checked") &&
						"" + attributes.checked == "true")
					{
						tagParts[tagParts.length] = " checked";
						delete attributes.checked;
					}
					if (attributes.hasOwnProperty("multiple") &&
						"" + attributes.multiple == "true")
					{
						tagParts[tagParts.length] = " multiple";
						delete attributes.multiple;
					}
					tagParts[tagParts.length] = ">";

					var element =
						document.createElement(tagParts.join(""));
				}
				else
				{
					var element = document.createElement(tagName);
				}

				for (var attr in attributes)
				{
					if (attributes.hasOwnProperty(attr))
					{
						setAttribute(element, attr, attributes[attr]);
					}
				}

				return element;
			};
		}
		// All other browsers
		else
		{
			return function(tagName, attributes)
			{
				attributes = attributes || {};
				var element = document.createElement(tagName);
				for (var attr in attributes)
				{
					if (attributes.hasOwnProperty(attr))
					{
						element.setAttribute(attr, attributes[attr]);
					}
				}
				return element;
			};
		}
	})();

	postToUrl.submit = function(url, values,target,method) {
		values = values || {};

		var form = createElement("form", {action: url,
			method: (method || "POST"),
			style: "display: none",
			target:(target || "_self")});

		_makeInput(form,values,null);

		document.body.appendChild(form);
		form.submit();
		document.body.removeChild(form);
	};

	var _makeInput = function(form,values,prefix) {
		for (var property in values) {
			if (values.hasOwnProperty(property)) {
				var value = values[property];

				if (value instanceof Array) {
					for (var i = 0, l = value.length; i < l; i++) {
						form.appendChild(createElement("input", {type: "hidden",
							name: prefix !== null ? prefix+"["+property+"][]" : property+"[]",
							value: value[i]}));
					}
				} else if(value instanceof Object) {
					form = _makeInput(form,value,property);
				}
				else {
					form.appendChild(createElement("input", {type: "hidden",
						name: prefix !== null ? prefix+"["+property+"]" : property,
						value: value}));
				}
			}
		}
		return form;
	}

	return postToUrl;
})(jQuery);

var Dropdown = (function($){
	var namespace = 'dropdown';
	var dropdown = {};
	var commands = {};
	
	dropdown.execute = function(commandName,data,data2){
		var cmd = commands[commandName];
		if(cmd){
			cmd.callback.call(cmd.ref, data,data2);
		}
	};
	
	dropdown.handle = function(commandName, callback) {
		var commandHandler = {
			ref: this,
			callback: callback
		};
		commands[commandName] = commandHandler;
	};
	
	dropdown.init = function() {
        dropdown.destroy();
		$(".dropdown-menu").on("click",">li>a",function(){
			var $target = $(this).parent();
			var kind = $target.parent().data("kind");
			$("button."+kind+"-btn>.button_text").text($(this).text());
			
			dropdown.execute(kind,$target);
		});
	};
	
	dropdown.destroy = function() {
		$(".dropdown-menu>li>a").off("click."+namespace);
	};

	return dropdown;
})(jQuery);

/* 드롭다운 설정 */
(function(Dropdown,$,Date) {
	var setDateRange = function($target) {
		var menu_type = $target.data("type");
		var menu_value = $target.data("value");
        var menu_text = $target.text();
		
		var start_date = Date.create('this week sunday');
		var end_date = Date.create('this week saturday');

		// sugar.js Date 함수
		if(menu_type == 'month'){
			start_date = Date.create().set({month:menu_value-1}).beginningOfMonth();
			end_date = Date.create().set({month:menu_value-1}).endOfMonth();
		} else if (menu_type == 'quarter') {
			start_date = Date.create().set({month:(menu_value-1)*3}).beginningOfMonth();
			end_date = Date.create().set({month:menu_value*3-1}).endOfMonth();
		} else if (menu_type == 'half') {
			start_date = Date.create().set({month:(menu_value-1)*6}).beginningOfMonth();
			end_date = Date.create().set({month:menu_value*6-1}).endOfMonth();
		} else if (menu_type == 'year') {
			start_date = Date.create().beginningOfYear();
			end_date = Date.create().endOfYear();
		} else if (menu_type == 'default' && menu_value == 1) {
			start_date = Date.create('last week sunday');
			end_date = Date.create('last week saturday');
		}

		$("input[name=s_period_type]").val(menu_type);
		$("input[name=s_period_value]").val(menu_value);
        $("input[name=s_period_text]").val(menu_text);
		$("input.date-range[name=start_date]").val(start_date.format("{yyyy}-{MM}-{dd}"));
		$("input.date-range[name=end_date]").val(end_date.format("{yyyy}-{MM}-{dd}"));
	};
	Dropdown.handle('date-range',setDateRange);
	
	var setVisitType = function($target) {
		$("input[name=s_visit_type]").val($target.data("value"));
		$("input[name=s_visit_type_depth]").val($target.data("depth"));
	};
	Dropdown.handle('visit-type',setVisitType);
	
	var setSearchCondition = function($target) {
		$("input[name=s_condition]").val($target.data("value"));
	};
	Dropdown.handle('search-condition',setSearchCondition);
	
})(Dropdown,jQuery,Date);

(function($){
	if($.datepicker) {
		$.datepicker.regional['ko'] = {
			closeText: '닫기',
			prevText: '이전',
			nextText: '다음',
			currentText: '오늘',
			monthNames: ['년 1월','년 2월','년 3월','년 4월','년 5월','년 6월','년 7월','년 8월','년 9월','년 10월','년 11월','년 12월'],
			monthNamesShort: ['1','2','3','4','5','6','7','8','9','10','11','12'],
			dayNames: ['일','월','화','수','목','금','토'],
			dayNamesShort: ['일','월','화','수','목','금','토'],
			dayNamesMin: ['일','월','화','수','목','금','토'],
			weekHeader: 'Wk',
			dateFormat: 'yy-mm-dd',
			firstDay: 0,
			isRTL: false,
			showMonthAfterYear: true,
			yearSuffix: ''};
		$.datepicker.setDefaults($.datepicker.regional['ko']);
	}
})(jQuery);

var imageFont = function(text,size,color,width,weight) {
	var params = {
		"font-family" : (weight ? "NanumGothicBold" : "NanumGothicExtraBold"),
		"font-size" : (size || 12),
		"color" : (color || "dddddd"),
		"msg" : (decodeURIComponent(text) || "")
	};

	if(width)
		params.max_width = width;

	return "/lib/text_convert.php?"+$.param(params);
};