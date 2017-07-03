import React, { Component } from 'react'
import EditBox from './EditBox'
import InfoBox from './InfoBox'
import ExperienceBox from './ExperienceBox'
import SkillsBox from './SkillsBox'
import ProjectsBox from './ProjectsBox'

export default class ContentBox extends Component {

  constructor(props) {
    super(props)
  }

  componentWillMount() {
  }

  componentDidMount() {
    this.setState({

    })
  }

  componentDidUpdate() {

  }

  updateFieldValue(newVal, updateDB) {
    this.props.updateFieldValue(newVal, this.props.id, updateDB)
  }

  render() {
    let sharedProps = {
      id: this.props.id,
      edit: (id) => this.props.edit(id),
      editing: this.props.editing,
      values: this.props.values,
      updateFieldValue: (newVal, updateDB) => this.updateFieldValue(newVal, updateDB),
      showMessage: this.props.showMessage,
      message: this.props.message,
      updatingValues: this.props.updatingValues
    }

    let boxes = {
      'info': <InfoBox
        {...sharedProps}
      />,
      'experience': <ExperienceBox
        {...sharedProps}
      />,
      'skills': <SkillsBox
        {...sharedProps}
      />,
      'projects': <ProjectsBox
        {...sharedProps}
      />
    }

    return boxes[this.props.id]
  }
}
