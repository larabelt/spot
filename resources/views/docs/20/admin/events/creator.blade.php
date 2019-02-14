<a name="events-creator"></a>

## How to Create a Event

To create a Event, start by going to POIs → Event and click on the "Add Event" button.

@include('belt-core::docs.partials.iframe', ['src' => '/docs/preview/spot/2.0/admin/screen?content=creator.events&style=content', 'height' => 375])

**(Above) Event Creator Screen**

#### Main Tab for Jen's Islands Eats Happy Hour:

@include('belt-core::docs.partials.image', ['src' => '20/admin/spot/assets/event-editor.png'])

@include('belt-core::docs.partials.table', [
    'rows' => [
        ['Is Active', 'Check this box to make the Event publicly available.'],
        ['Name', '​​Jens Island Eatery Happy Hour'],
        ['Start At', 'Stipulate date and time when event will start.'],
        ['Ends At', 'Stipulate date and time when event will end.'],
        ['Phone Number', 'Enter valid number here. Formatting will show up as it is entered in CMS on site.'],
        ['Toll Free Phone', '_Leave Blank_'],
        ['Website', 'Add website with http:// or https://:​ ​http://website.com'],
        ['Email', 'Add Email'],
        ['Priority', '_Leave Blank_'],
        ['Hours', 'Add Hours text'],
        ['Meta Title', 'Will be page title and will show up on tab in browser.'],
        ['Meta Description', 'This is for SEO purposes and shows up in the site\'s search results.'],
        ['Meta Keywords​​', 'Add keywords for SEO purposes if you desire.'],
    ],
])

Click on Save. Additional fields and tabs will become available.