import React, { Component } from 'react'

export default class EditBox extends Component {

  constructor(props) {
    super(props)

    this.state = {
    }
  }

  componentWillMount() {
  }

  componentDidMount() {
  }

  componentDidUpdate() {
  }

  saveChanges(e) {
    switch(this.props.id) {
      case 'info':
        this.props.updateFieldValue(this.refs.field.value, true)
        break
      case 'experience':
        let experience = {
          title: this.refs.title.value,
          company: this.refs.company.value,
          location: this.refs.location.value,
          from: {
            month: this.refs.from_month.value,
            year: this.refs.from_year.value
          },
          to: {
            month: this.refs.to_month.value,
            year: this.refs.to_year.value
          },
          present: this.refs.present.value,
          description: this.refs.description.value
        }

        this.props.updateFieldValue(experience, this.props.experienceID, true)
        break

      case 'skills':
        let skill = {
          name: this.refs.skill_name.value,
          level: this.refs.skill_level.value
        }

        this.props.updateFieldValue(skill, this.props.skillID, true)
        break
    }
  }

  getMonthOptions() {
    let months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December']
    return months.map((item, index) => { return <option key={item}>{item}</option> })
  }

  getYearOptions() {
    let thisYear = new Date().getFullYear()
    let years = []
    for(var i = 0; i <= 30; i++) {
      years.push(thisYear - i)
    }
    return years.map((item, index) => { return <option key={item}>{item}</option> })
  }

  renderEditFields() {
    switch(this.props.id) {
      case 'info':
        let fieldID = `field-${this.props.id}`
        return <div>
            <label className="sr-only" htmlFor={fieldID}>{expertProfile['headings'][this.props.id]['text']}</label>
            <textarea id={fieldID} name={fieldID} defaultValue={this.props.fieldValue} ref="field" />
          </div>
        break;

      case 'experience':
        return <div>
            <div>
              <label htmlFor="experience-title">Title</label>
              <input type="text" id="experience-title" name="experience-title" defaultValue={this.props.fieldValue.title} ref="title" />
            </div>
            <div>
              <label htmlFor="experience-company">Company</label>
              <input type="text" id="experience-company" name="experience-company" defaultValue={this.props.fieldValue.company} ref="company" />
            </div>
            <div>
              <label htmlFor="experience-location">Location</label>
              <input type="text" id="experience-location" name="experience-location" defaultValue={this.props.fieldValue.location} ref="location" />
            </div>
            <div className="timespan">
              <div>
                From:
                <label htmlFor="experience-from-month">Month</label>
                <select id="experience-from-month" name="experience-from-month" defaultValue={this.props.fieldValue.from.month} ref="from_month">
                  {this.getMonthOptions()}
                </select>

                <label htmlFor="experience-from-year">Year</label>
                <select id="experience-from-year" name="experience-from-year" defaultValue={this.props.fieldValue.from.year} ref="from_year">
                  {this.getYearOptions()}
                </select>
              </div>
              <div>
                To:
                <label htmlFor="experience-to-month">Month</label>
                <select id="experience-to-month" name="experience-to-month" defaultValue={this.props.fieldValue.to.month} ref="to_month">
                  {this.getMonthOptions()}
                </select>

                <label htmlFor="experience-to-year">Year</label>
                <select id="experience-to-year" name="experience-to-year" defaultValue={this.props.fieldValue.to.year} ref="to_year">
                  {this.getYearOptions()}
                </select>
              </div>
            </div>
            <div>
              <label htmlFor="experience-present">This is my present workplace
                <input type="checkbox" id="experience-present" name="experience-present" defaultChecked={this.props.fieldValue.present} ref="present" />
              </label>
            </div>
            <div>
              <label htmlFor="experience-description">Description</label>
              <textarea id="experience-description" name="experience-description" defaultValue={this.props.fieldValue.description} ref="description" />
            </div>
          </div>
        break;

      case 'skills':
        return <div>
            <div>
              <label htmlFor="skill-name">Skill Name</label>
              <input type="name" id="skill-name" name="skill-name" defaultValue={this.props.fieldValue.name} ref="skill_name" />
            </div>
            <div>
              <label htmlFor="skill-level">Skill Level (%)</label>
              <input type="number" min="1" max="100" id="skill-level" name="skill-level" defaultValue={this.props.fieldValue.level} ref="skill_level" />
            </div>
          </div>
        break;
    }
  }

  render() {
    let id = this.props.id
    let message, spinner

    if(this.props.showMessage && this.props.message) {
      message = this.props.message
    }

    if(this.props.updatingValues) {
      spinner = <span className="loading">Saving...</span>
    }

    return (
      <div data-id={this.props.id} className="edit-box" onClick={(e) => e.target.className === 'edit-box' ? this.props.close() : ''}>
        <div className="edit-inner">
          <div className="edit-header">
            <h3>
              <span dangerouslySetInnerHTML={{__html: expertProfile['edit-icon']}}></span>
              &nbsp;
              {expertProfile['edit-text']}: {expertProfile['headings'][this.props.id]['text']}
            </h3>
            <a href="#" onClick={(e) => {e.preventDefault(); this.props.close()}} dangerouslySetInnerHTML={{__html: expertProfile['close-icon']}}></a>
          </div>
          <div className="edit-main">
            {this.renderEditFields()}
          </div>
          <div className="edit-footer">
            <input type="submit" className="edit-submit" onClick={this.saveChanges.bind(this)} value="Save Changes" />{spinner}{message}
          </div>
        </div>
      </div>
    )
  }
}
