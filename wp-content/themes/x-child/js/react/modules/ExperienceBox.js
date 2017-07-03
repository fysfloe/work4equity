import React, { Component } from 'react'
import EditBox from './EditBox'

export default class ExperienceBox extends Component {

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

  edit(e, id) {
    if(e) e.preventDefault();

    this.setState({
      experienceID: id
    })

    this.props.edit(this.props.id)
  }

  updateFieldValue(newVal, index) {
    let experience = this.props.values
    if(typeof index !== 'undefined' && index !== null) {
      experience[index] = newVal
    } else {
      experience.push(newVal)
    }

    this.props.updateFieldValue(experience, false)
  }

  addNew() {
    let newVal = {
      title: '',
      company: '',
      location: '',
      from: {
        month: '',
        year: ''
      },
      to: {
        month: '',
        year: ''
      },
      present: false,
      description: ''
    }

    this.updateFieldValue(newVal)
    this.edit(null, this.props.values.length - 1)
  }

  render() {
    let id = this.props.id
    let editBox, renderValue

    if(this.props.editing) {
      editBox = <EditBox
                  id={this.props.id}
                  close={() => this.props.edit('')}
                  fieldValue={this.props.values[this.state.experienceID]}
                  updateFieldValue={(newVal, index, updateDB) => this.updateFieldValue(newVal, index, updateDB)}
                  experienceID={this.state.experienceID}
                  showMessage={this.props.showMessage}
                  message={this.props.message}
                  updatingValues={this.props.updatingValues}
                />
    }

    let experience = this.props.values
    if(typeof experience !== 'undefined') {
      renderValue = <ul className="experience">
        {experience.map((item, index) => {
          let key = `experience-${index}`
          let to

          if(item.to) {
            to = item.to.month + ' ' + item.to.year
          } else if(item.present) {
            to = 'Present'
          }
          return (
            <li key={key}>
              <div className="timespan">
                {item.from.month} {item.from.year} &mdash; {to}
              </div>
              <span dangerouslySetInnerHTML={{__html: expertProfile['work-icon']}}></span>
              <h4>{item.title}</h4>
              <div className="company">{item.company}</div>
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

        <button type="button" className="add-new" onClick={this.addNew.bind(this)}>
          <span dangerouslySetInnerHTML={{__html: '+'}} />
          Add New
        </button>
      </div>
    )
  }
}
