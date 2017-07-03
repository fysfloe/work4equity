import React, { Component } from 'react'
import Header from './Header'
import ContentBox from './ContentBox'
import InfoBox from './InfoBox'
import ExperienceBox from './ExperienceBox'
import SkillsBox from './SkillsBox'
import ProjectsBox from './ProjectsBox'

export default class App extends Component {

  constructor(props) {
    super(props)

    this.state = {
      currentlyEditing: '',
      boxes: [],
      values: [],
      showMessage: false,
      updatingValues: false
    }
  }

  componentWillMount() {
  }

  componentDidMount() {
    this.setState({
      boxes: [
        'info',
        'experience',
        'skills',
        'projects'
      ],
      values: {
        'info': expertProfile['values']['info'],
        'experience': expertProfile['values']['experience'],
        'skills': expertProfile['values']['skills'],
        'projects': expertProfile['values']['projects']
      }
    })
  }

  componentDidUpdate() {
  }

  updateFieldValueDB(index) {
    jQuery.post({
      type: "POST",
      url: expertProfile['ajaxurl'],
      data: {
        action: 'update_post_meta',
        data: {
          'post_id': expertProfile['post_id'],
          'meta_key': index,
          'meta_value': this.state.values[index]
        }
      },
      success: this.updatedFieldValuesAjax.bind(this),
    })

    this.setState({
      updatingValues: true
    })
  }

  showMessage(type) {
    let message

    if(type === 'success') {
      message = <div className="success msg">Your profile has been updated!</div>

      setTimeout(() => this.setState({ currentlyEditing: '' }), 1500)
    } else if(type === 'error') {
      message = <div className="error msg">There were some errors while updating you profile</div>
    }

    this.setState({
      message: message,
      showMessage: true
    })
    //setTimeout(() => this.setState({showMessage: false}), 3000)
  }

  updatedFieldValuesAjax(data) {
    this.setState({
      updatingValues: false
    })
    if(data) {
      this.showMessage('success')
    } else {
      this.showMessage('error')
    }
  }

  updateFieldValue(newVal, index, updateDB = true) {
    let values = this.state.values

    console.log(updateDB);

    values[index] = newVal

    this.setState({
      values: values
    })

    if(updateDB) {
      this.updateFieldValueDB(index)
    }
  }

  currentlyEditing(id) {
    let state = {
      currentlyEditing: id
    }

    // closed edit box
    if(!id) {
      state.message = ''
      state.showMessage = false
    }

    this.setState(state)
  }

  render() {
    return (
      <div>
        <Header />
        <div className="expert-content-boxes-wrapper">
          {this.state.boxes.map((item, index) => {
            let editing = this.state.currentlyEditing === item

            return (
              <ContentBox
                id={item}
                key={index}
                editing={editing}
                edit={(id) => this.currentlyEditing(id)}
                updateFieldValue={(newVal, index, updateDB) => this.updateFieldValue(newVal, index, updateDB)}
                showMessage={this.state.showMessage}
                message={this.state.message}
                updatingValues={this.state.updatingValues}
                values={this.state.values[item]}
              />
            )
          })}
        </div>
      </div>
    )
  }
}
