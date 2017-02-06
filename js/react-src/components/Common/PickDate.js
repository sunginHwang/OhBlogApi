import React from "react";
import ReactDOM from "react-dom";

import CommonModal from "./Modal";

var PickDateModal = React.createClass({
	getInitialState : function() {
		return {
			date:moment().format('YYYY-MM-DD'),
			month:moment().subtract(moment().day(),'days').format('M'),
			week:weekOfMonth(moment())
		}
	},
	handleConfirm : function() {
		var params = {date:moment(this.state.date).startOf('week').format('YYYY-MM-DD'),meeting_date:this.state.date};
		$.ajax({
			url:'/report/check_report_exist',
			data: _.extend(params,{
				target:this.props.targetModal,
				year:this.props.groupInfo.year,
				group_no:this.props.groupInfo.group_no,
				month:this.state.month,
				week:this.state.week
			}),
			dataType:'json'
		}).done(function(result){
			if(result.status > 0) {
				this.hide();
				this.props.handleModalClick(this.props.targetModal,params);
			} else {
				alert(result.msg);
			}
		}.bind(this));
	},
	show : function() {
		this.refs.commonModal.show();
		var datePicker = ReactDOM.findDOMNode(this.refs.reportDatePicker);
		$(datePicker).datetimepicker({
			locale:'ko',
			dayViewHeaderFormat:'YYYY-MM',
			inline:true
		});

		$(datePicker).on("dp.change",function(e){
			var pickDate = {
				date : e.date.format('YYYY-MM-DD'),
				month : e.date.clone().subtract(e.date.day(),'days').format('M'),
				week : weekOfMonth(e.date.clone())
			};
			this.setState(pickDate);
		}.bind(this));
	},
	hide : function() {
		var datePicker = ReactDOM.findDOMNode(this.refs.reportDatePicker);
		$(datePicker).off("dp.change");
		this.refs.commonModal.hide();
	},
	render : function() {
		return <CommonModal ref="commonModal" style={{maxWidth:"365px"}} title="모임일 선택" footer={true} handleConfirm={this.handleConfirm} >
			<div className="modal-body">
				<div className="datetimepicker" ref="reportDatePicker"></div>
				<div className="pickDateInfo">
					모임일이 <span className="pickDate" ref="reportDate">{this.state.date}</span>로<br/>
					<span ref="reportMonth">{this.state.month}</span>월 <span ref="reportWeek">{this.state.week}</span>주 목장보고서가 생성됩니다
				</div>
			</div>
		</CommonModal>;
	}
});

export default PickDateModal;