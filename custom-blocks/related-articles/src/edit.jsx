const { __ } = wp.i18n;
const {
  useBlockProps,
  InspectorControls,
} = wp.blockEditor;
const { PanelBody, BaseControl } = wp.components;

import "./editor.css";

export default function Edit({ attributes, setAttributes }) {
  const blockProps = useBlockProps();

  const { posts } = attributes;

  const template = [
    [
      "core/columns",
      {
        lock: true,
        isStackedOnMobile: true,
        templateLock: "all",
      },
      Array.apply(null, Array(posts)).map(() => [
        "core/column",
        { templateLock: "all" },
        [
          [
            "core/group",
            { templateLock: false },
            [
              [
                "core/post-featured-image",
              ],
              [
                "core/post-title",
                {
                  level: 3,
                }
              ]
            ]
          ]
        ]
      ])
    ]
  ];

  return (
    <>
      <InspectorControls>
        <PanelBody title={__("Properties")}>
          <BaseControl label={__("Number of posts", "vdv")} >
            <input
              type="number"
              min="2"
              max="5"
              value={+posts}
              onChange={({ target }) => setAttributes({ posts: Math.max(2, Math.min(5, +target.value)) })}
            />
          </BaseControl>
        </PanelBody>
      </InspectorControls>
      <div {...blockProps}>
        <h3 className="wp-block-heading">Articles relacionats</h3>
        <div className="wp-block-columns is-layout-flex">
          {Array.apply(null, Array(posts)).map(() => (
            <div className="wp-block-column is-layout-flow wp-block-column-is-layout-flow">
              <article className="wp-block-group query-entry has-global-padding is-layout-constrained wp-block-group-is-layout-constrained">
                <figure className="wp-block-post-featured-image" style={{ aspectRatio: "4/3", paddingBottom: 0, marginBottom: 0, backgroundColor: "lightgrey" }}>
                  <img className="attachment-post-thumbnail size-post-thumbnail wp-post-image" />
                </figure>
                <div className="wp-block-group is-vertical is-nowrap is-layout-flex wp-block-group-is-layout-flex">
                  <h3 className="has-link-color wp-block-post-title has-large-font-size">Post Title</h3>
                  <div className="wp-block-excerpt">
                    <p>Lorem ipsum dolor sit amer</p>
                  </div>
                </div>
              </article>
            </div>
          ))}
        </div>
      </div>
    </>
  );
}
