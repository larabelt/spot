<a name="events-editor"></a>

## How to Edit a Event

@include('belt-docs::partials.iframe', ['src' => '/docs/preview/spot/2.0/admin/screen?content=editor.events&style=content'])

**(Above) Event Editor Screen**

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