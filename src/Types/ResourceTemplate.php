<?php

/**
 * Model Context Protocol SDK for PHP
 *
 * (c) 2024 Logiscape LLC <https://logiscape.com>
 *
 * Based on the Python SDK for the Model Context Protocol
 * https://github.com/modelcontextprotocol/python-sdk
 *
 * PHP conversion developed by:
 * - Josh Abbott
 * - Claude 3.5 Sonnet (Anthropic AI model)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @package    logiscape/mcp-sdk-php
 * @author     Josh Abbott <https://joshabbott.com>
 * @copyright  Logiscape LLC
 * @license    MIT License
 * @link       https://github.com/logiscape/mcp-sdk-php
 *
 * Filename: Types/ResourceTemplate.php
 */

declare(strict_types=1);

namespace Mcp\Types;

/**
 * A template description for resources available on the server
 */
class ResourceTemplate implements McpModel {
    use ExtraFieldsTrait;

    public function __construct(
        public readonly string $name,
        public readonly string $uriTemplate,
        public ?string $description = null,
        public ?string $mimeType = null,
        public ?array $annotations = null,
    ) {}

    public function validate(): void {
        if (empty($this->name)) {
            throw new \InvalidArgumentException('Resource template name cannot be empty');
        }
        if (empty($this->uriTemplate)) {
            throw new \InvalidArgumentException('Resource template URI template cannot be empty');
        }
    }

    public function jsonSerialize(): mixed {
        $data = get_object_vars($this);
        return array_merge($data, $this->extraFields);
    }
}