import React from "react";

import Header from "./Header";
import { LoginBox, PasswordResetModal, PasswordSetModal, ConfirmSMSModal } from "../modals/Login";
import { ConfirmTempUserModal, AddUserModal, ConfirmLinkUserModal } from "../modals/LinkUser"

var Main = React.createClass({
	getInitialState : function() {
		var navs = [
			{name:"home",text:"홈",icon:"icon-home"},
			{name:"member",text:"인사관리",icon:"icon-users"},
			{name:"approval",text:"전자결재",icon:"icon-brush"},
			{name:"stats",text:"교세통계",icon:"icon-chart-bar"},
		];

		var smallNavs = [
			{name:"sms",text:"문자발송",icon:"icon-mail"},
			{name:"config",text:"환경설정",icon:"icon-cog"},
		];

		return {
			showLogin:false,contentShade:false,
			navs:navs,smallNavs:smallNavs,managerName:null,page:null,memberImage:'/images/noimg.png',
		};
	},
	componentDidMount : function() {

	},
	handleModalClick : function(name,params) {
		var params = params || [];
		if(this.refs[name]) {
			this.refs[name].setState(params);
			this.refs[name].show();
		} else {
			alert('준비중입니다 !');
		}
	},
	handleLogoutClick : function() {
		if(confirm('정말 로그아웃 하시겠습니까') === false) return;

		$.ajax({
			url:'/flat_home/main/logout_proc'
		}).done(function(){
			this.setState({showLogin:true,showInfo:true,managerName:null,menuList:[],navs:[],smallNavs:[]});
		}.bind(this));
	},
	closeModals : function() {
		this.setState({showInfo:false,showSearchBox:false,contentShade:false});
	},
	render : function(){
		var contentShade = this.state.contentShade ? <div className="content_shade" onClick={this.closeModals} /> : null;
		return (
			<div id="main_wrap" className={this.state.showLogin ? "blur" : null} style={this.state.mainStyle}>

				<Header navs={this.state.navs} smallNavs={this.state.smallNavs} currentRoute={this.props.routes[this.props.routes.length-1].name} managerName={this.state.managerName} showLogin={this.state.showLogin} handleLoginClick={this.handleLoginClick} handleLogoutClick={this.handleLogoutClick} />
				{this.props.children && React.cloneElement(this.props.children, {
					handleModalClick : this.handleModalClick,
				})}
				{contentShade}
				<div id="main_footer" className="main_layout">
				</div>

				<PasswordResetModal ref="passwordReset" handleModalClick={this.handleModalClick} />
				<ConfirmSMSModal ref="confirmSms" handleModalClick={this.handleModalClick} />
				<PasswordSetModal ref="passwordSet" />

				<ConfirmTempUserModal ref="confirmTempUser" handleModalClick={this.handleModalClick} />
				<AddUserModal ref="addUser" />
				<ConfirmLinkUserModal ref="confirmLinkUser" />

				{this.state.showLogin ? <LoginBox churchCode={this.state.churchCode} churchTitle={this.state.churchTitle} handleModalClick={this.handleModalClick} /> : null}
				{this.state.showLogin ? <div className="shade" onClick={this.closeModals} /> : null}
			</div>
		);
	}
});

export default Main;