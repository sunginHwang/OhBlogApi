import React from "react";
import ReactDOM from "react-dom";

import cookie from "react-cookie";

import CommonModal from "../components/Common/Modal";

var LoginBox = React.createClass({
	getInitialState : function() {
		return {userId : cookie.load('att_remember_id'),rememberId : (cookie.load('att_remember_id') ? true : false)};
	},
	loginProc : function(e) {
		if(this.refs.userId.value == ""){
			alert('아이디를 입력해 주세요.');
			this.refs.userId.focus();
		}else if(this.refs.userPasswd.value == ""){
			alert('비밀번호를 입력해 주세요.');
			this.refs.userPasswd.focus();
		}else{
			$.ajax({
				type:'post',
				url:'/main/login_proc',
				data:$(this.refs.loginForm).serialize(),
				dataType:'json'
			}).done(function(result){
				if(result.status < 1){
					alert(result.msg);
					return;
				}

				document.location.reload();
			}.bind(this));
		}

		e.preventDefault();
	},
	handleIdChange : function(e) {
		this.setState({userId:e.target.value});
	},
	handleRememberChange : function(e) {
		this.setState({rememberId: e.target.checked ? 1 : 0});
	},
	handleResetPasswd : function() {
		this.props.handleModalClick('passwordReset');
	},
	render : function() {
		return (
			<div className="login_box">
				<div className="church_title"><img src={(this.props.churchName ? imageFont(this.props.churchName,18,"ffffff",250,'bold') : null)} /></div>
				<div className="login_area">
					<form id="login_form" ref="loginForm" method="post" action="/" onSubmit={this.loginProc}>
						<table className="table-login">
							<colgroup>
								<col width="100px" /><col />
							</colgroup>
							<tbody>
							<tr>
								<td colSpan="2"><input type="text" ref="userId" name="userId" placeholder="ID" value={this.state.userId || ''} onChange={this.handleIdChange} /></td>
							</tr>
							<tr>
								<td colSpan="2"><input type="password" ref="userPasswd" name="userPasswd" placeholder="Password" /></td>
							</tr>
							</tbody>
							<tfoot>
							<tr>
								<td className="login_btn" colSpan="2">
									<button type="submit" className="btn btn-sm btn-att">로그인</button>
								</td>
							</tr>
							<tr>
								<td className="reset_info" onClick={this.handleResetPasswd}>비밀번호재설정</td>
								<td className="save_info"><label>아이디저장 <input type="checkbox" name="rememberInfo" checked={this.state.rememberId} onChange={this.handleRememberChange} /></label></td>
							</tr>
							</tfoot>
						</table>
					</form>
				</div>
			</div>
		);
	}
});

var PasswordReset = React.createClass({
	handleConfirm : function(e) {
		if(this.refs.userId.value == ""){
			alert('사용자이름을 입력해 주세요.');
			this.refs.userId.focus();
		}else if(this.refs.userPhone.value == ""){
			alert('휴대폰번호를 입력해 주세요.');
			this.refs.userPhone.focus();
		}else{
			$.ajax({
				type:'post',
				url:'/main/check_user_phone',
				data:{userId:this.refs.userId.value,userPhone:this.refs.userPhone.value},
				dataType:'json'
			}).done(function(result){
				if(result.status < 1){
					alert(result.msg);
					return;
				}

				$(ReactDOM.findDOMNode(this.refs.commonModal)).one("hidden.bs.modal",function(e){
					this.props.handleModalClick('confirmSms',{userId:this.refs.userId.value,userPhone:this.refs.userPhone.value});
				}.bind(this));
				this.hide();

			}.bind(this));
		}
		e.preventDefault();
	},
	show : function() {
		this.refs.commonModal.show();
	},
	hide : function() {
		this.refs.commonModal.hide();
	},
	render : function() {
		return <CommonModal ref="commonModal" style={{maxWidth:"365px"}} title="비밀번호 재설정" footer={true} handleConfirm={this.handleConfirm} >
			<div className="modal-body passwd-reset-body">
				<p>* 이름(식별자)과 휴대폰번호를 입력하세요.</p>
				<p>* 교적부에 등록된 휴대전화로 인증번호가 발송됩니다.</p>
				<table className="table-password-reset">
					<colgroup>
						<col style={{width:"80px"}}/>
						<col />
					</colgroup>
					<tbody>
					<tr>
						<th>이름(식별자)</th>
						<td><input type="text" ref="userId" name="userId" /></td>
					</tr>
					<tr>
						<th>휴대폰번호</th>
						<td><input type="text" ref="userPhone" name="userPhone"/></td>
					</tr>
					</tbody>
				</table>
			</div>
		</CommonModal>;
	}
});

var PasswordSet = React.createClass({
	handleConfirm : function(e) {
		var regex = /^.*(?=^.{4,15}$)(?=.*\d)(?=.*[a-zA-Z]).*$/;
		if(this.refs.passwd.value == ""){
			alert('비밀번호를 입력해 주세요.');
			this.refs.passwd.focus();
		} else if (!regex.test(this.refs.passwd.value)) {
			alert("영문,숫자 포함하여 4자 이상 비밀번호로 입력해 주세요");
		} else if(this.refs.passwd.value !== this.refs.passwdConfirm.value){
			alert('동일한 비밀번호를 입력해 주세요.');
			this.refs.passwdConfirm.focus();
		} else{
			$.ajax({
				type:'post',
				url:'/main/change_passwd',
				data:{
					userPhone:this.state.userPhone,
					userId:this.state.userId,
					userPasswd:this.refs.passwd.value
				},
				dataType:'json'
			}).done(function(result){
				alert(result.msg);
				this.hide();
			}.bind(this));
		}
		e.preventDefault();
	},
	show : function() {
		this.refs.commonModal.show();
	},
	hide : function() {
		this.refs.commonModal.hide();
	},
	render : function() {
		return <CommonModal ref="commonModal" style={{maxWidth:"365px"}} footer={true} title="비밀번호 재설정" handleConfirm={this.handleConfirm} >
			<div className="modal-body">
				<form id="passwd_reset_form" ref="passwdResetForm" method="post" action="/" onSubmit={this.handleConfirm}>
					<table className="table-password-reset">
						<colgroup>
							<col style={{width:"80px"}}/>
							<col />
						</colgroup>
						<tbody>
						<tr>
							<th>새비밀번호</th>
							<td><input type="password" ref="passwd" name="newPasswd" /></td>
						</tr>
						<tr>
							<th>새비밀번호확인</th>
							<td><input type="password" ref="passwdConfirm" name="passwdConfirm"/></td>
						</tr>
						</tbody>
					</table>
				</form>
			</div>
		</CommonModal>;
	}
});

var ConfirmSMS = React.createClass({
	getInitialState : function() {
		return {userPhone:"",userId:""};
	},
	handleConfirm : function(e) {
		if(this.refs.confirmNumber.value == ""){
			alert('인증번호를 입력해 주세요.');
			this.refs.confirmNumber.focus();
		}else{
			$.ajax({
				type:'post',
				url:'/main/check_sms_confirm',
				data:{
					confirmNumber:this.refs.confirmNumber.value
				},
				dataType:'json'
			}).done(function(result){
				if(result.status < 1){
					alert(result.msg);
					return;
				}
				$(ReactDOM.findDOMNode(this.refs.commonModal)).one("hidden.bs.modal",function(e){
					this.props.handleModalClick('passwordSet',{userId:this.state.userId,userPhone:this.state.userPhone});
				}.bind(this));
				this.hide();
			}.bind(this));
		}
		e.preventDefault();
	},
	handleCallSmsClick : function() {
		$.ajax({
			type:'post',
			url:'/main/call_sms_number',
			data:{userPhone:this.state.userPhone},
			dataType:'json'
		}).done(function(tempNumber){
			alert('인증번호가 발송되었습니다 !');
		}.bind(this));
	},
	show : function() {
		this.refs.commonModal.show();
	},
	hide : function() {
		this.refs.commonModal.hide();
	},
	render : function() {
		return <CommonModal ref="commonModal" style={{maxWidth:"365px"}} title="휴대폰 SMS 인증" footer={true} handleConfirm={this.handleConfirm} >
			<div className="modal-body confirm-sms-body">
				<p>
					* 인증번호 요청을 클릭하시면 인증번호를 발송해 드립니다.<br/>
					인증번호가 도착하면 휴대폰 SMS인증번호를 입력 후 [비밀번호변경]버튼을 클릭하여 주십시오.
				</p>
				<p>* 착신전환 등록된 휴대폰으로는 SMS 인증번호가 발송되지 않습니다.</p>
				<table className="table-confirm-sms">
					<colgroup>
						<col style={{width:"80px"}}/>
						<col />
					</colgroup>
					<tbody>
					<tr>
						<th>휴대폰번호</th>
						<td>
							{this.state.userPhone.substring(0,6)+"**-****"}
							<button type="button" className="btn btn-xs btn-att" onClick={this.handleCallSmsClick}>인증번호 요청</button>
						</td>
					</tr>
					<tr>
						<th>인증번호</th>
						<td>
							<input type="text" ref="confirmNumber" name="confirmNumber" />
						</td>
					</tr>
					</tbody>
				</table>
				<p>* SMS인증번호는 이동통신사의 사정에 따라 전송 지연이 될 수 있습니다.</p>
				<p>* SMS인증번호 실패 시 인증번호를 다시 요청해 주시기 바랍니다.</p>
				<p>* 개인정보의 휴대번호로 6자리 인증번호를 발송하였습니다.</p>
			</div>
		</CommonModal>;
	}
});

export {
	LoginBox,
	PasswordReset as PasswordResetModal,
	PasswordSet as PasswordSetModal,
	ConfirmSMS as ConfirmSMSModal,
};