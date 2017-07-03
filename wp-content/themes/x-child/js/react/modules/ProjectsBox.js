import React, { Component } from 'react'
import EditBox from './EditBox'

export default class ProjectsBox extends Component {

  constructor(props) {
    super(props)

    this.state = {}
  }

  componentWillMount() {
  }

  componentDidMount() {
    this.setState({
      fieldValue: expertProfile['values'][this.props.id]
    })
  }

  componentDidUpdate() {

  }

  edit(e) {
    e.preventDefault();
    this.props.edit(this.props.id)
  }

  updateFieldValue(newVal) {
    this.setState({
      fieldValue: newVal
    })
  }

  render() {
    let id = this.props.id
    let editBox, renderValue

    if(this.props.editing) {
      editBox = <EditBox
                  id={this.props.id}
                  close={() => this.props.currentlyEditing('')}
                  fieldValue={this.props.values}
                  updateFieldValue={(newVal) => this.updateFieldValue(newVal)}
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
          // <a href="#" className="edit-section" onClick={(e) => this.edit(e)} dangerouslySetInnerHTML={{__html: expertProfile['edit-icon']}}></a>
        </div>
        {renderValue}
      </div>
    )
  }
}
