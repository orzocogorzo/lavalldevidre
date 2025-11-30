import Edit from "./edit";
import metadata from "./block.json";
import icon from "./icon";
import "./style.css";

wp.blocks.registerBlockType(metadata.name, {
  icon,
  edit: Edit,
  save: () => null,
});
