import React, { useEffect } from 'react';
import { Virtual } from 'swiper';
import { Navigation } from 'swiper';
import { Swiper, SwiperSlide, useSwiper } from 'swiper/react';


function GalleryModal( props ) {
    const { selectedItem } = props;

    const mySwiper = useSwiper();

    useEffect(() => {
      if(mySwiper) mySwiper.update(); //! not working
    },[selectedItem]);

      return ( 
      <div className="modal modal--gallery fade" id="modal_gallery" tabIndex="-1" aria-hidden="true">
        <div className="modal-dialog modal-dialog-centered modal-dialog-scrollable">
          <div className="modal-content">
            <div className="modal-header border-0">
              <button type="button" className="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div className="modal-body">
            { selectedItem && selectedItem.gallery &&
              <Swiper 
              modules={[Virtual, Navigation]}
              spaceBetween={0}
              slidesPerView={1}
              initialSlide={0}
              navigation={true}
              virtual
              className="gallery-slider">
              {selectedItem.gallery.map((slide, index) => (
                <SwiperSlide key={selectedItem.id + index} virtualIndex={index}>
                  <img src={slide} alt="" />
                </SwiperSlide>
              ))}
            </Swiper>
            }
            </div>
          </div>
        </div>
      </div>
      );
};

export default GalleryModal;