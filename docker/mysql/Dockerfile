FROM mysql:5.7
MAINTAINER Ezequiel Schneider <ezequielrs@gmail.com>

RUN apt-get update && apt-get install -y wget
RUN apt-get install -y nano

#COPY custom_my.cnf /etc/mysql/my.cnf
COPY custom_my.cnf /etc/alternatives/my.cnf

#RUN sudo chown mysql:mysql /etc/mysql/my.cnf
RUN chmod 0644 /etc/mysql/my.cnf

#####################################
# Set Timezone
#####################################

ARG TZ=UTC
ENV TZ ${TZ}
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone && chown -R mysql:root /var/lib/mysql/

#RUN chmod 0444 /etc/mysql/my.cnf
