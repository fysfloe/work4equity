import React, { Component } from 'react'

export default class Header extends Component {

  constructor(props) {
    super(props)
  }

  componentWillMount() {
  }

  componentDidMount() {
  }

  componentDidUpdate() {

  }

  render() {
    return (
      <header>
        <figure>
          <div className="entry-featured">
            <div className="expert-img-wrap" dangerouslySetInnerHTML={{__html: expertProfile['featured_img']}}></div>
          </div>
          <figcaption>
            <hgroup>
              <h2>{expertProfile['title']}</h2>
              <h3>{expertProfile['position']}</h3>
            </hgroup>
          </figcaption>
        </figure>
        <nav id="expert-nav">
          <ul>
            <li>
              <a href="#info">
                <span dangerouslySetInnerHTML={{__html: expertProfile['headings']['info']['icon']}}></span>
                {expertProfile['headings']['info']['text']}
              </a>
            </li>
            <li>
              <a href="#experience">
                <span dangerouslySetInnerHTML={{__html: expertProfile['headings']['experience']['icon']}}></span>
                {expertProfile['headings']['experience']['text']}
              </a>
            </li>
            <li>
              <a href="#projects">
                <span dangerouslySetInnerHTML={{__html: expertProfile['headings']['projects']['icon']}}></span>
                {expertProfile['headings']['projects']['text']}
              </a>
            </li>
          </ul>
        </nav>
      </header>
    )
  }
}
