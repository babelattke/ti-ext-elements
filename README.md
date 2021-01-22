## Babel Elements Extension

**Compatibility** 

| Extension        | Version           | Test Date  |
| ------------- |:-------------:| -----:|
| TastyIgniter      | 3.0.4.beta.26 | 22/01/2021 |


### Elements


#### Main Header

- Single Image
- Title 
- Content (rich-editor)
- Comment
- Button (Optional)
- Button Text
- Button URL

#### Featured Items

- Title 
- Sub-title
- Comment

_Add menu items from component settings._

#### Info Cards

Compatible with Font Awesome Icons  
https://fontawesome.com/

Themify Icons - Next Update  
Flaticon Icons -  Next Update  

#### Video Element

- Single Image
- Title 
- Sub-title
- Video URL Format: https://www.youtube.com/embed/VIDEO_ID

#### Image and Text

- Single Image
- Title 
- Sub-title
- Comment
- Text area background color

#### Gallery

- Multiple Images
- Title 
- Sub-title
- Comment

_Pending: custom height & width_

#### Menu List (not ready yet)

Custom menu item list // Dine-in Menu  
Add menu items from component settings.   


### Installation

- Add to extensions/babel/elements
- Enable extension in Admin -> System -> Extensions
- Add this line of code at the end of your main .scss file  
 _(i.e: themes/yourTheme/assets/src/scss/app.scss)_

`// Extensions`  
`@import "extensions/+import.extensions";`

*Save your theme settings. (Admin -> Design -> Themes -> YourTheme -> Customise -> Save)*

## Usage 

Admin -> Design -> Elements  
You can create as many elements as you want and place it on your pages.
