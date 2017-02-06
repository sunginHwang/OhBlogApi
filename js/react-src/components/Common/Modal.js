import React from "react";
import ReactDOM from "react-dom";

/**
 * 공통 모달
 *
 */
var CommonModal = React.createClass({
	getInitialState : function() {
		return {modalBody:null};
	},
	componentDidMount : function() {
		$(ReactDOM.findDOMNode(this.refs.modal)).modal({show: false});
	},
	componentWillUnmount : function() {
		$(ReactDOM.findDOMNode(this.refs.modal)).off();
	},
	show : function() {
		$(ReactDOM.findDOMNode(this.refs.modal)).modal("show");
	},
	hide : function() {
		$(ReactDOM.findDOMNode(this.refs.modal)).modal("hide");
	},
	render : function() {
		var header = null,footer = null;
		if(this.props.title != "") {
			header = <div className="modal-header">
				<button type="button" className="close" data-dismiss="modal" aria-hidden="true">
					<img src="/images/login_new/btn_cancel02.png"/>
				</button>
				<h5 className="modal-title">{this.props.title}</h5>
			</div>;
		}
		if(this.props.footer) {
			footer = <div className="modal-footer">
				<button id="btn_report" className="btn btn-sm btn-confirm btn-att" onClick={this.props.handleConfirm}>확인</button>
				<button id="btn_close" className="btn btn-sm btn-cancel btn-default" data-dismiss="modal" aria-hidden="true" >취소</button>
			</div>;
		}

		return <div ref="modal" className="modal fade">
			<div className="modal-dialog" style={this.props.style}>
				<div className="modal-content" style={this.props.contentStyle ? this.props.contentStyle : {}}>
					{header}
					{this.props.children ? this.props.children : <img src="/images/ajax-loader.gif" />}
					{footer}
				</div>
			</div>
		</div>
	}
});

export default CommonModal;