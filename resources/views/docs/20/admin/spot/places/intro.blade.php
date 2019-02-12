<a name="places"></a>

## How to Create a Place

Start by going to POIs→Places. Click on **Add a Place​​**.

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

@include('belt-docs::partials.table', [
    'rows' => [
        ['Hero Image', 'Link an image you wish to use for the main page image. You will need to add the image to the attachments tab or section prior to uploading it in the Main Tab.'],
        ['Heading', '_Leave Blank_'],
        ['Hero Heading', 'This is the main page heading'],
        ['Intro Copy', 'Shows up under Hero Image and before Body'],
        ['Body', 'Body copy of page'],
    ],
])

@include('belt-docs::partials.image', ['src' => '20/admin/spot/assets/place-detail-example.png'])

@include('belt-docs::partials.table', [
    'rows' => [
        ['Accommodation Details', 'Ignore for restaurants, more useful for Accommodations ex. hotels'],
    ],
])

@include('belt-docs::partials.image', ['src' => '20/admin/spot/assets/param-group-accommodation-detail.png'])

@include('belt-docs::partials.table', [
    'rows' => [
        ['Island Map Settings', 'Controls the default map that appears near the bottom of the page on all Places. This map can be hidden by switching "Show Island Map" to "Hide."'],
    ],
])

@include('belt-docs::partials.image', ['src' => '20/admin/spot/assets/param-group-island-map.png'])

@include('belt-docs::partials.table', [
    'rows' => [
        ['Island Map Heading', 'Headline shows above map'],
        ['Island Map Intro', 'Intro text shows above map'],
        ['Island Map', 'Choose the theme for your island map'],
        ['Show Island Map', 'Show or hide the island map from your Place.'],
    ],
])

Front End view of Map section:

@include('belt-docs::partials.image', ['src' => '20/admin/spot/assets/map-example.png'])

@include('belt-docs::partials.table', [
    'rows' => [
        ['Big Image Link', 'Add a link to other sections of the site. Shows up at bottom of page.'],
    ],
])

@include('belt-docs::partials.image', ['src' => '20/admin/spot/assets/param-big-image-link-adventure.png'])

@include('belt-docs::partials.table', [
    'rows' => [
        ['Candid Tag', 'Choose theme for Instagram photos that show up on your Place page.'],
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

#### Landmark Page Type Notes:

* or Places → Landmark, the hours field is not used.
* For Places → Landmark, creating a place for a landmark creates a tout for the Search List and a
POI on the map but the actual page that's created is not used on the site.
* For Places → Landmark, the content URL field is used instead of the website field. A link to the
Content URL shows up on the tout in the list view and on the popup on the map.

@include('belt-docs::partials.image', ['src' => '20/admin/spot/assets/param-content-url.png'])