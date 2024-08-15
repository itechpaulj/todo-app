<?php
namespace DynamicVisibilityForElementor;

trait Image {

	public static function get_thumbnail_sizes() {
		$sizes = get_intermediate_image_sizes();
		$ret = [];

		foreach ( $sizes as $s ) {
			$ret[ $s ] = $s;
		}

		return $ret;
	}

	public static function is_resized_image( $imagePath ) {
		$ext = pathinfo( $imagePath, PATHINFO_EXTENSION );
		$pezzi = explode( '-', substr( $imagePath, 0, -( strlen( $ext ) + 1 ) ) );
		if ( count( $pezzi ) > 1 ) {
			$misures = array_pop( $pezzi );
			$fullsize = implode( '-', $pezzi ) . '.' . $ext;
			$pezzi = explode( 'x', $misures );
			if ( count( $pezzi ) == 2 ) {
				if ( is_numeric( $pezzi[0] ) && is_numeric( $pezzi[1] ) ) {
					return $fullsize; // return original value
				}
			}
		}
		return false;
	}

	public static function get_image_id( $image_url ) {
		global $wpdb;
		$sql = $wpdb->prepare( "SELECT ID FROM {$wpdb->prefix}posts WHERE post_type LIKE 'attachment' AND guid LIKE %s;",
			'%' . $wpdb->esc_like( $image_url ) . '%'
		);
		$attachment = $wpdb->get_col( $sql );
		$img_id = reset( $attachment );
		if ( ! $img_id ) {
			if ( strpos( $image_url, '-scaled.' ) !== false ) {
				$image_url = str_replace( '-scaled.', '.', $image_url );
				$img_id = self::get_image_id( $image_url );
			}
		}
		return $img_id;
	}

	/**
	 * Get Image alt
	 *
	 * @param integer $attachment_ID
	 * @return string
	 */
	public static function get_image_alt( int $attachment_ID ) {
		$alt = get_post_meta( $attachment_ID, '_wp_attachment_image_alt', true );
		if ( ! empty( $alt ) ) {
			return esc_attr( strip_tags( $alt ) );
		}
		return '';
	}

	/**
	 * Get Attachment
	 *
	 * @param string|int $attachment_id
	 * @return array<string,mixed>|null
	 */
	public static function get_attachment( $attachment_id ) {
		$attachment_id = intval( $attachment_id ); // phpstan
		if ( ! $attachment_id ) {
			return null;
		}

		$attachment = get_post( $attachment_id );
		if ( ! $attachment || 'attachment' !== $attachment->post_type ) {
			return null;
		}

		$img_src = wp_get_attachment_image_src( $attachment_id, 'full' );
		if ( ! $img_src ) {
			return null;
		}

		return [
			'id' => $attachment_id,
			'alt' => esc_attr( get_post_meta( $attachment_id, '_wp_attachment_image_alt', true ) ),
			'caption' => wp_kses_post( $attachment->post_excerpt ),
			'description' => wp_kses_post( $attachment->post_content ),
			'href' => get_attachment_link( $attachment_id ),
			'src' => $img_src[0],
			'title' => esc_html( $attachment->post_title ),
			'url' => $img_src[0],
			'width' => $img_src[1],
			'height' => $img_src[2],
		];
	}
}
