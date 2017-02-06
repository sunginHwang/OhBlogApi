import React from "react";

/**
 * 공통헤더
 *
 */
var CommonHeader = React.createClass({
	render : function() {
		return <div className="common-header">
			<h5 className="title">{this.props.title}</h5>
			<div className="search-area">
				{this.props.children}
			</div>
		</div>
	}
});

export default CommonHeader;