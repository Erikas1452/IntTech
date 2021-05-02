import React, { Component } from "react";
import ReactDOM from 'react-dom';

class Notes extends Component {

  render() {
    return (
        <div className="content">
            <div className="newNote">
                <form>
                    <input type="email" placeholder="Enter Email" name="loginEmail" id="loginEmail" required onChange={this.handleChange}/>
                    <input type="email" placeholder="Enter Email" name="loginEmail" id="loginEmail" required onChange={this.handleChange}/>
                    <div className="take-note-container">
                        <button>Save</button>
             </div>
                </form>
            </div>


        </div>

    );
  }
}

export default Notes;
if (document.getElementById('notes')) {
    ReactDOM.render(<Notes />, document.getElementById('notes'));
}
