import React, { Component } from 'react'
import EditBox from './EditBox'

export default class SkillsBox extends Component {

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

  edit(e, id) {
    e.preventDefault();

    this.setState({
      skillID: id
    })

    this.props.edit(this.props.id)
  }

  updateFieldValue(newVal, index) {
    let skills = this.props.values
    skills[index] = newVal

    this.props.updateFieldValue(skills)
  }

  render() {
    let id = this.props.id
    let editBox, renderValue

    if(this.props.editing) {
      editBox = <EditBox
                  id={this.props.id}
                  close={() => this.props.edit('')}
                  fieldValue={this.props.values[this.state.skillID]}
                  updateFieldValue={(newVal, index, updateDB) => this.updateFieldValue(newVal, index, updateDB)}
                  skillID={this.state.skillID}
                  showMessage={this.props.showMessage}
                  message={this.props.message}
                  updatingValues={this.props.updatingValues}
                />
    }

    let skills = this.props.values
    if(typeof experience !== 'undefined') {
      renderValue = <ul className="skills">
        {skills.map((item, index) => {
          let key = `skill-${index}`

          return (
            <li key={key}>
              <h4>{item.name}</h4>
              <div className="skill-level">{item.level} %</div>
              <div className="skill-level-bar" style={{width: item.level + '%'}}></div>
              <a href="#" className="edit-section" onClick={(e) => this.edit(e, index)} dangerouslySetInnerHTML={{__html: expertProfile['edit-icon']}}></a>
            </li>
          )
        })}
      </ul>
    }

    return (
      <div id={this.props.id}>
        {editBox}
        <div className="box-header">
          <div>
            <span dangerouslySetInnerHTML={{__html: expertProfile['headings'][id]['icon']}}></span>
            <h3>{expertProfile['headings'][id]['text']}</h3>
          </div>
        </div>
        {renderValue}
      </div>
    )
  }
}
