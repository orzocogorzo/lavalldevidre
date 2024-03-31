import { __ } from "@wordpress/i18n";
import {
  useBlockProps,
  InspectorControls,
  InnerBlocks,
} from "@wordpress/block-editor";
import { PanelBody, TextControl } from "@wordpress/components";

import "./editor.scss";

export default function Edit({ attributes, setAttributes }) {
  const blockProps = useBlockProps();

  const { custom_field } = attributes;

  const setField = (field) => {
    setAttributes({ custom_field: field });
  };

  return (
    <>
      <InspectorControls>
        <PanelBody title={__("Properties")}>
          <TextControl
            label={__("field")}
            help={__("Custom field name to pick from the post meta")}
            value={custom_field}
            onChange={setField}
          />
        </PanelBody>
      </InspectorControls>
      <div {...blockProps}>
        <InnerBlocks template={TEMPLATE} />
      </div>
    </>
  );
}

const TEMPLATE = [
  [
    "core/paragraph",
    {
      placeholder: __("Setup your custom field template"),
    },
  ],
];
