import React from "react";

var SimpleTable = React.createClass({
	render : function() {
		return <div className="simple-table-wrap clear">
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
						return <SimpleTableRow key={i} fields={this.props.fields} row={row} idx={this.props.idx}/>;
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

var SimpleTableRow = React.createClass({
	render : function() {
		return (
			<tr>{
				_.map(this.props.fields, function (field, i) {
					return <td key={i} style={field.style}>{this.props.row[field.name]}</td>;
				}.bind(this))
			}</tr>
		);
	}
});

export default SimpleTable;