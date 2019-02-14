<a name="places-creator"></a>

## How to Create a Place

To create a Place, start by going to POIs → Place and click on the "Add Place" button.

@include('belt-docs::partials.iframe', ['src' => '/docs/preview/spot/2.0/admin/screen?content=creator.places&style=content', 'height' => 375])

**(Above) Place Creator Screen**

#### Main Tab:

@include('belt-docs::partials.table', [
    'rows' => [
        ['Type', '​​There are 5 type of Places in the Dominica CMS and creating each kind is very similar. In this instance, we are creating a restaurant'],
    ],
])

@include('belt-docs::partials.image', ['src' => '20/admin/spot/assets/place-creator-subtype.png'])

@include('belt-docs::partials.table', [
    'rows' => [
        ['Is Active', 'Check this box to make the Place publicly available.'],
        ['Name', '​​Jens Island Eats'],
        ['Phone Number', 'Enter valid number here. Formatting will show up as it is entered in CMS on site.'],
        ['Toll Free Phone', '_Leave Blank_'],
        ['Website', 'Add website with http:// or https://:​ ​http://website.com'],
        ['Email', 'Add Email'],
        ['Hours', 'Add Hours text'],
        ['Meta Title', 'Will be page title and will show up on tab in browser.'],
        ['Meta Description', 'This is for SEO purposes and shows up in the site\'s search results.'],
        ['Meta Keywords​​', 'Add keywords for SEO purposes if you desire.'],
    ],
])

Click on Save. Additional fields and tabs will become available.