import React from "react";

import numeral from "numeral";

/**
 * 목록형 테이블
 *
 */
var CommonTable = React.createClass({
	render : function() {
		return <div className="common-table-wrap clear">
			<table className="table table-condensed">
				<colgroup>{
					_.map(this.props.fields,function(field,i){
						return <col key={i} style={field.width != "" ? {width:field.width} : {}} />;
					})
				}</colgroup>
				<thead>
				<tr>{
					_.map(this.props.fields,function(field,i){
						return <th key={i}>{field.text}</th>
					})
				}
				</tr>
				</thead>
				<tbody>
				{
					_.map(this.props.list,function(row,i){
						return <CommonTableRow key={i} fields={this.props.fields} row={row} idx={this.props.idx} handleRowClick={this.props.handleRowClick} handleIconClick={this.props.handleIconClick} handleModalClick={this.props.handleModalClick} />;
					}.bind(this))
				}
				{(
					_.size(this.props.list) == 0
						? <tr><td colSpan={_.size(this.props.fields)}>표시할 내용이 없습니다</td></tr> : null
				)}
				</tbody>
			</table>
		</div>
	}
});

var CommonTableRow = React.createClass({
	handleRowClick : function() {
		this.props.handleRowClick(this.props.row[this.props.idx]);
	},
	handleIconClick : function(fieldName) {
		this.props.handleIconClick(fieldName,this.props.row[this.props.idx]);
	},
	render : function() {
		return (
			<tr>{
				_.map(this.props.fields, function (field, i) {
					return <td key={i} onClick={this.handleRowClick} style={field.style}>
						{(
							(field.icon || field.modal)
								? (field.icon
									? <div className="icon_wrap" onClick={this.handleIconClick.bind(this,field.name)}><i className={field.icon}></i></div>
									: <span className="text-modal" onClick={this.handleIconClick.bind(this,field.name)}>{this.props.row[field.name] ? this.props.row[field.name] : <i className="icon-pencil"></i>}</span>
								)
								: (field.format ? numeral(this.props.row[field.name]).format(field.format) : this.props.row[field.name])
						)}
					</td>;
				}.bind(this))
			}</tr>
		);
	}
});

export default CommonTable;