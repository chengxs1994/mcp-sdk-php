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
 * Filename: Types/LoggingMessageNotification.php
 */

declare(strict_types=1);

namespace Mcp\Types;

/**
 * Notification for logging messages
 */
class LoggingMessageNotification extends Notification {
    public function __construct(
        public readonly mixed $data,
        public readonly LoggingLevel $level,
        public ?string $logger = null,
    ) {
        parent::__construct('notifications/message');
    }

    public function validate(): void {
        parent::validate();
        if ($this->data === null) {
            throw new \InvalidArgumentException('Logging message data cannot be null');
        }
    }
}