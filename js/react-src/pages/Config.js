import React from "react";

var ConfigWrap = React.createClass({
	componentDidMount : function() {

	},
	render : function() {
		return <div id="main_content" className="main_layout">
			<iframe id="main_frame" ref="main_frame" name="main_frame" src="/config/main" frameBorder="0"></iframe>
		</div>;
	}
});

export default ConfigWrap;