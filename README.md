# PHP contact form

## What
The objective of this challenge is to give you the opportunity to learn PHP by solving a real life need: processing a contact form. Because HTML is good to create the visual interface of the form, but you will need a backend script to actually process the data and compose the email message to be sent to the client.


## Why
Because your client would like you to make him a website with a few pages. One of the pages should actually contain a contact form, so that people can send him messages. Create a fully-functioning [html contact form](https://htmldog.com/guides/html/beginner/forms/) which will be processed by a php script. That form has to be validated by the W3C and follow the basics of [Accessibility](https://htmldog.com/guides/html/advanced/forms/)... Because *[the web is for everyone](https://thatsthespir.it/quote/view/188)*.


## Learning Objectives
*Thanks to this project, you can learn the following :*
1. Backend: A basic but real-life form processing: sanitization > validation > execution > feedback
1. Backend: create a function that displays all error messages above the form
1. Git: useful Readme file
1. Backend : deploy on Heroku
1. (bonus) Backend: Use third-party dependencies (php classes)
1. (bonus) backend : Use of an external SMTP server to send emails



## Self-Evaluation Criteria
- [ ] When one submits the form, you receive an email with the form content to my email address
- [x] Most PHP code is above the html doctype line
- [x] All PHP variable names are explicit and consistently named
- [x] PHP contents as little comments as possible, but as much as necessary
- [ ] DRY: repeated instructions are wrapped into custom PHP functions
- [x] If one forgets the email address or the message, the proper feedback message is displayed and no email is sent
- [x] If one enters an incorrectly formatted email message, the proper feedback message is displayed and no email is sent
- [ ] If there are more than one error, all error messages are displayed in one html (un)ordered list (above the first question in the form).
- [ ] If one enters some javascript code in any input field, the javascript is removed
- [ ] The HTML is valid html5, as per the [W3C Validator](https://validator.w3.org/)
- [ ] The HTML is accessible, as per the [Web Accessiblity Checker](https://achecker.ca/checker/) online tool.
- [x] The Git Repository Readme file is useful (what / why / when / who / where)