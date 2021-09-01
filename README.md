# ResourceSpace plugin: ms2rs

A plugin for ResourceSpace (a Digital Asset management system), allowing for the creation of local "resources" from a Microsoft Stream URL. Based on the Vimeo -> ResourceSpace (vm2rs) plugin.
 

## Screenshot

![resourcespace-screenshot](https://user-images.githubusercontent.com/2672028/131600233-5a68244c-48b3-48a8-b234-a4acb180f176.jpg)

## Links

Name | Description | Link
------------ | ------------- | -------------
Writing your own plugins|Knowledgebase article to help with developing plugins| [View on ResourceSpace](https://www.resourcespace.com/knowledge-base/developers/modifications-and-writing-your-own-plugin)
Microsoft oEmbed|Add Microsoft Stream videos to other apps by using oEmbed| [View on Microsoft docs](https://docs.microsoft.com/en-us/stream/embed-video-oembed)
Microsoft Graph thumbnails|Get video thumbnails from SharePoint using Microsoft Graph| [View on Handsontek](https://sharepoint.handsontek.net/2019/06/11/get-video-thumbnails-from-sharepoint-using-microsoft-graph/)

## Dependencies / Requirements
Due to Microsoft office/365 security & logins, user must be logged in & authenticated.

## Operation
The Microsoft Stream to ResourceSpace plugin hooks into the resource View page to embed a Stream video. On the options page for this plugin you can enter the ID of a metadata field that is used to store the URL of the Stream video.

## Metadata field creation

In your web browser open your ResourceSpace site, navigate to: System >  Metadata fields: Select resource type 'Video', Create metadata field called ...  'StreamURL' / Text box (single line). Take note of the ID.

## Installation

To install, cd into the `plugins` directory, clone, then install.
```
cd plugins
sudo git clone https://github.com/404ryannotfound/ms2rs.git
npm install
```
Alternatively:

Download the zip file https://github.com/404ryannotfound/ms2rs/archive/master.zip. Unzip the contents, rename the '```ms2rs-master```' folder to '```ms2rs```', re-zip the folder, and change from '```.zip```' to '```.rsp```'
In your web browser open your ResourceSpace site, navigate to: System >  Plugins > Bottom of the page: Select the  ms2rs.rsp 

## Operation
The Microsoft Stream to ResourceSpace plugin hooks into the resource View page to embed a Stream video. On the options page for this plugin you can enter the ID of a metadata field that is used to store the URL of the Stream video. Metadata field creation

## Setup
In your web browser open your ResourceSpace site, navigate to: System >  Plugins > Microsoft Stream to ResourceSpace > Options: Add your Metadata field ID, Save & exit

## Usage
To create a new resource, select the Drop menu (top right) > Resources > Create new resource record
Select Video, add metadata as required. Under Video Properties: add the url to StreamURL i.e. https://web.microsoftstream.com/video/12345678-5ba4-5ac3-b870-ce8b0df12345
If using the Embed code, be sure to exclude '```?autoplay=false&showinfo=true```' from the url.

## Issues known/contributing

Log any issues to the [Issues](https://github.com/404ryannotfound/ms2rs/issues) page.

### Known issues/Limitations

PLUGIN CURRENTLY NOT WORKING due to regex URL match- https://github.com/404ryannotfound/ms2rs/issues/1

## Contributing

Contributors are more than welcome! :hugs: Please read [CONTRIBUTING.md](https://gist.github.com/404ryannotfound/0ca9e2841326f3b115b437008fec5233) for details on our code of conduct, and the process for submitting pull requests to us.

## Authors

* **404ryannotfound** - *Initial work* - [404ryannotfound](https://github.com/404ryannotfound)

See also the list of [contributors](https://github.com/404ryannotfound/ms2rs/contributors) who participated in this project.

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details

## Acknowledgments

* [ResourceSpace](https://www.resourcespace.com/) For an amazing DAM, and allowing for Open Source contributions and usage.
* [VM2RS (Vimeo embed)](https://www.resourcespace.com/knowledge-base/plugins/vm2rs) For the initial plugin code from which this is adapted.
