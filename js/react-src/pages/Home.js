import React from "react";

var HomeWrap = React.createClass({
	render : function() {
		return <div id="main_content" className="main_layout">
			<iframe id="main_frame" ref="main_frame" name="main_frame" src="/home/main" frameBorder="0"></iframe>
		</div>;
	}
});

export default HomeWrap;