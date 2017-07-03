import React, { Component } from 'react'
import EditBox from './EditBox'

export default class InfoBox extends Component {

  constructor(props) {
    super(props)

    this.state = {}
  }

  componentWillMount() {
  }

  componentDidMount() {
  }

  componentDidUpdate() {

  }

  edit(e) {
    e.preventDefault();
    this.props.edit(this.props.id)
  }

  updateFieldValue(newVal) {
    this.props.updateFieldValue(newVal)
  }

  render() {
    let id = this.props.id
    let editBox, renderValue

    if(this.props.editing) {
      editBox = <EditBox
                  id={this.props.id}
                  close={() => this.props.edit('')}
                  fieldValue={this.props.values}
                  updateFieldValue={(newVal, updateDB) => this.updateFieldValue(newVal, updateDB)}
                  showMessage={this.props.showMessage}
                  message={this.props.message}
                  updatingValues={this.props.updatingValues}
                />
    }

    return (
      <div id={this.props.id}>
        {editBox}
        <div className="box-header">
          <div>
            <span dangerouslySetInnerHTML={{__html: expertProfile['headings'][id]['icon']}}></span>
            <h3>{expertProfile['headings'][id]['text']}</h3>
          </div>
          <a href="#" className="edit-section" onClick={(e) => this.edit(e)} dangerouslySetInnerHTML={{__html: expertProfile['edit-icon']}}></a>
        </div>
        {this.props.values}
      </div>
    )
  }
}
