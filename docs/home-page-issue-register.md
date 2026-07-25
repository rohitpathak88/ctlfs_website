# Home Page Issue Register

Scope: Home page only. Sources: `Website issues.docx`, `CTL-Doc.pdf`, and Figma Home frame `2859:157`.

## Status legend

- Pending — identified but not yet changed.
- In Progress — implementation underway.
- Completed — fixed and validated against the source material.

| ID | Priority | Source requirement | Affected Home/Figma area | Status | Completion evidence |
| --- | --- | --- | --- | --- | --- |
| HI-01 | High | The marquee line must not stop after item 2 and must repeat without an excessive gap. | Announcement marquee below Hero | Pending | Desktop and mobile visual loop check; reduced-motion fallback check. |
| HI-02 | High | Remove the highlighted formatting artefact and increase separation between Vision and Mission. | About Us block | Pending | No stray rule/artifact; Vision/Mission spacing matches Figma dimensions. |
| HI-03 | Critical | “Services” must remain visible; remove duplicated main heading from its subpoint and correct spacing. | Services grid | Pending | Text visibility at every breakpoint; one heading per card; Figma spacing check. |
| HI-04 | High | Paired headings must use visually identical font colour treatment. | Shared gradient headings | Pending | Computed colour/gradient token comparison and desktop visual check. |
| HI-05 | Medium | Use ampersands where the source copy requires “&”, not commas. | CTL-Doc-derived Home content | Pending | Content search and visual proofread. |
| HI-06 | Medium | Standardize hyphen/dash glyphs and spacing throughout copy. | CTL-Doc-derived Home content | Pending | Content lint/search for inconsistent separators; manual proofread. |
| HI-07 | Medium | Use 1, 2, 3, 4 rather than 01, 02, 03, 04 where identified. | Home differentiators/process numbering | Pending | Screenshot comparison at desktop and mobile. |
| HI-08 | Critical | Remove copy duplicated between primary and subpoint content. | Home sections containing repeated text | Pending | DOM/content audit confirms each source sentence occurs only in its intended section. |

## Home audit findings added to the delivery backlog

| ID | Priority | Finding | Status | Completion evidence |
| --- | --- | --- | --- | --- |
| HA-01 | Critical | Create and activate a child theme; do not modify the parent. | Completed | `cjl-financial-child` active; Home responds with HTTP 200. |
| HA-02 | Critical | Add valid in-page targets for Home navigation and remove broken Home anchors. | Pending | Keyboard and URL-fragment navigation test. |
| HA-03 | Critical | Restore the absent partner/alliance section with source-approved content/assets. | Pending | Section visible without dependency on empty CPT data. |
| HA-04 | Critical | Replace Home placeholder copy with CTL-Doc production copy. | Pending | Placeholder-content search returns no Home template matches. |
| HA-05 | High | Correct the About image fallback path and ensure valid alt text. | Pending | Image HTTP/visual test and accessibility audit. |
| HA-06 | High | Ensure Home content remains visible when JavaScript is unavailable. | Pending | No-JS browser validation. |
| HA-07 | High | Replace off-topic placeholder news content and empty links. | Pending | CTL-Doc copy/link audit. |
| HA-08 | High | Add baseline Home metadata, social metadata, and structured data. | Pending | Rich Results/HTML metadata validation. |
| HA-09 | High | Move inline Home form behavior to child-owned JavaScript and provide accessible feedback. | Pending | Keyboard, screen-reader, and form smoke tests. |
| HA-10 | Medium | Reduce Home asset and render cost without changing the Figma result. | Pending | Lighthouse comparison and image-weight audit. |
