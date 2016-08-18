<?php

/**
 * 缓存key名称管理类
 *
 * @author pengmeng
 */
class Cache_Key {

	public static function videoInfo($videoId) {
		return 'video-info-' . $videoId;
	}

	public static function mainM3u8($videoId) {
		return 'mainM3u8-info-' . $videoId;
	}

	public static function subM3u8($videoId, $clarity) {
		return 'subM3u8-info-' . $clarity . '-' . $videoId;
	}

	/**
	 * 为播放页做的缓存key
	 */
	public static function videoDetails($videoId) {
		return 'video-details-' . $videoId;
	}

	/**
	 * 节目信息缓存key
	 * @return str
	 */
	public static function programInfo($programId) {
		return 'live-program-' . $programId;
	}

	/**
	 * 节目机位缓存key
	 * @return str
	 */
	public static function programStreamInfo($programId) {
		return 'live-program-stream-' . $programId;
	}

}
