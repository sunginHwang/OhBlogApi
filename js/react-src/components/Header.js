import React from 'react';
import {Link} from "react-router";

var Header = React.createClass({
	getInitialState : function() {
		return {showManagerInfoBox:false};
	},
	componentDidMount : function() {
		window.addEventListener('mousedown', this.pageClick, false);
	},
	componentWillUnmount: function() {
		window.removeEventListener('mousedown', this.pageClick);
	},
	handleGroupClick : function(group_no) {
		this.props.handleGroupClick(group_no);
	},
	handleChangePasswdClick : function() {
		this.props.handleModalClick("passwordChange");
	},
	pageClick : function() {
		if(this.mouseIsDownOnManagerInfoBox) return;
		this.setState({showManagerInfoBox:false});
	},
	handleMouseDown : function() {
		this.mouseIsDownOnManagerInfoBox = true;
	},
	handleMouseUp : function() {
		this.mouseIsDownOnManagerInfoBox = false;
	},
	render : function(){
		return (
			<div id="main_header" className="main_layout">
				<div className="title_bar">
					<div className="iconp ohjic_logo" onClick={this.onChurchClick}></div>
					<div className="manager_area">
						{this.props.managerName} 님
						{this.props.managerName ? <button className="btn btn-xs btn-dark btn-logout" onClick={this.props.handleLogoutClick}>로그아웃</button> : null}
					</div>
					<SmallNavs navs={this.props.smallNavs} />
				</div>
				<NavBar navs={this.props.navs} currentRoute={this.props.currentRoute} showSearchLogBox={this.showSearchLogBox} closeModals={this.closeModals} />
				<div className={"nav_bottom_line nav-"+this.props.currentRoute}></div>
			</div>
		);
	}
});


var SmallNavs = React.createClass({
	render : function() {
		return (
			<ul className="navs-small">{
				_.map(this.props.navs,function(nav,i){
					return (
						<li key={i} id={nav.name}>
							<Link className={"nav-"+nav.name} activeClassName="active" to={nav.name}>
								<i className={nav.icon} />
								{nav.text}
							</Link>
						</li>
					)
				})
			}</ul>
		);
	}
});

var NavBar = React.createClass({
	render : function() {
		return (
			<div className="nav_bar">
				<div className="church_logo"><img src={imageFont("기독교대한성결총회",28,"dddddd",358)} /></div>
				<Navs navs={this.props.navs} currentRoute={this.props.currentRoute}/>
				<SearchBar showSearchLogBox={this.props.showSearchLogBox} closeModals={this.props.closeModals} handleNavs={this.props.handleNavs} />
			</div>
		);
	}
});

var Navs = React.createClass({
	render : function() {
		return (
			<ul className="navs">{
				_.map(this.props.navs,function(nav,i){
					var src = imageFont(nav.text,18,(nav.name == this.props.currentRoute ? "ffffff" : "bbbbbb"));
					return (
						<li key={i} id={nav.name}>
							<Link className={"nav-"+nav.name} activeClassName="active" to={nav.name}>
								<div className={"icon-nav "+nav.icon} />
								<img src={src} />
							</Link>
						</li>
					)
				}.bind(this))
			}</ul>
		);
	}
});

var SearchBar = React.createClass({
	nameSearch : function(e) {
		var searchStr = React.findDOMNode(this.refs.name).value.trim();
		var searchTidStr = React.findDOMNode(this.refs.tid).value.trim();
		if(searchStr.split(' ').join('').length == 0 && searchTidStr.split(' ').join('').length == 0){
			e.preventDefault();
			alert('검색할 성도를 입력해 주세요.');
			return;
		}

		this.props.handleNavs("menu_member");
		this.props.closeModals();
	},
	handleSearchDetail : function() {
		var params = {};
		var url = "/flat_member/search/detail_form";
		var callback = function($target){
			this.DetailSearch.init('modal',$target);
		};
		var functions = {DetailSearch:window.DetailSearch};
		ModalView.open(url,params,callback,functions,"745px");
	},
	handleSearchMember : function() {
		var params = {};
		var url = "/flat_member/search/member_form";
		var callback = function($target){
			this.MemberSearch.init('modal',$target);
		};
		var functions = {MemberSearch:window.MemberSearch};
		ModalView.open(url,params,callback,functions,"745px");
	},
	render : function() {
		return (
			<div className="search_bar">
				<form id="name_search_form" method="get" target="main_frame" action="/flat_member/list_box/frame" onSubmit={this.nameSearch}>
					<div className="input-group">
						<input type="text" name="s_[name]" className="form-control input-sm" ref="name" onClick={this.props.showSearchLogBox} onFocus={this.props.showSearchLogBox} tabIndex="-1"/>
						<span className="input-group-btn">
							<button type="submit" className="btn btn-search btn-xs"><i className="icon-search" /></button>
							<button type="button" className="btn btn-search btn-xs" onClick={this.handleSearchMember}><i className="icon-users" /></button>
							<button type="button" className="btn btn-search btn-xs" onClick={this.handleSearchDetail}><i className="icon-vcard" /></button>
						</span>
					</div>
					<input type="hidden" name="search_tid" id="search_tid" ref="tid" />
				</form>
			</div>
		);
	}
});

export default Header;