<a name="events"></a>

## How to Create a Event

Creating an event is very similar to creating a place.

Start by going to POIs→Events. Click on ​Add an Event​​.

#### Main Tab for Jen's Islands Eats Happy Hour:

@include('belt-docs::partials.image', ['src' => '20/admin/spot/assets/event-editor.png'])

@include('belt-docs::partials.table', [
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

@include('belt-docs::partials.table', [
    'rows' => [
        ['Slug​', 'Will auto-populate'],
        ['Date Info', 'Date text shows up on front end.'],
        ['Body', 'Text shows up in middle of page'],
        ['Big Image Link', 'Add a link to other sections of the site. Shows up at bottom of page.'],
    ],
])

@include('belt-docs::partials.image', ['src' => '20/admin/spot/assets/param-big-image-link-adventure.png'])

@include('belt-docs::partials.table', [
    'rows' => [
        ['Candid Tag', 'Choose theme for Instagram photos that show up on your Event page.'],
    ],
])

#### Locations tab:

Add your Place's address to add a point to the Island Map. User can use full address or latitude
and longitude. Additionally you can drag the purple dot to a specific point on the map.

#### Amenities tab:

Select applicable amenities for your Place, which will be listed in the Body of the page.

#### Attachments tab:

Upload images you want to use for your hero image here.

#### Terms tab:

* **Cruise** Items that are using the term Cruise, appear on the {{ $url }}/cruise-guests​ page
* **Landmark** Unique feature if a POI is a place like a waterfall. You want to reference the Term –
Landmark – Waterfall under the POI terms section. This applies to waterfalls, beaches, hiking trails, must see, dive sites, gorge